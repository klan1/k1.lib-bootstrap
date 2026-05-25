<?php
/**
 * Build knowledge graph JSON from PHP source files
 */

$srcDir = __DIR__ . '/src/klan1/html';
$gitCommit = trim(shell_exec('git rev-parse HEAD'));
$analyzedAt = date('c');

// Recursively get all PHP files
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($srcDir, RecursiveDirectoryIterator::SKIP_DOTS)
);
$phpFiles = [];
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $phpFiles[] = $file->getPathname();
    }
}
sort($phpFiles);

$nodes = [];
$nodeIds = [];
$edges = [];
$nodeIdByClass = [];

function extractDocBlock(string $content): ?string {
    // Try to find a class-level docblock (before namespace or class declaration)
    if (preg_match('/\/\*\*(.*?)\*\//s', $content, $m)) {
        return '/**' . $m[1] . '*/';
    }
    return null;
}

function extractDocBlockDescription(string $docBlock): string {
    $lines = explode("\n", $docBlock);
    $descLines = [];
    foreach ($lines as $line) {
        $line = preg_replace('/^\s*\/?\*\*?\s?/', '', $line);
        $line = preg_replace('/^\s*\*\/$/', '', $line);
        $line = rtrim($line);
        if ($line === '' || str_starts_with($line, '@')) {
            if (!empty($descLines)) {
                break;
            }
            continue;
        }
        $descLines[] = $line;
    }
    $desc = implode(' ', $descLines);
    return $desc ?: 'PHP file without description';
}

function extractAuthor(string $docBlock): ?string {
    if (preg_match('/@author\s+(.+)/m', $docBlock, $m)) {
        return trim($m[1]);
    }
    return null;
}

function extractTags(string $docBlock): array {
    $tags = [];
    if (preg_match_all('/@(\w+)(?:\s+(.+))?/m', $docBlock, $m, PREG_SET_ORDER)) {
        foreach ($m as $match) {
            $tagName = $match[1];
            $tagValue = isset($match[2]) ? trim($match[2]) : '';
            if (!isset($tags[$tagName])) {
                $tags[$tagName] = [];
            }
            $tags[$tagName][] = $tagValue;
        }
    }
    return $tags;
}

function extractTagNameFromClass(string $content, string $className): ?string {
    // Look for parent::__construct("tagname", ...)
    $escaped = preg_quote($className, '/');
    if (preg_match('/parent::__construct\s*\(\s*"([^"]+)"/', $content, $m)) {
        return $m[1];
    }
    return null;
}

function detectInheritance(string $content): ?string {
    if (preg_match('/class\s+\w+\s+extends\s+(\w+)/', $content, $m)) {
        return $m[1];
    }
    if (preg_match('/class\s+\w+\s+extends\s+\\k1lib\\html\\(\w+)/', $content, $m)) {
        return $m[1];
    }
    return null;
}

function detectUsesTrait(string $content): array {
    $traits = [];
    if (preg_match('/use\s+(\w+)/', $content, $m)) {
        $traits[] = $m[1];
    }
    return $traits;
}

function getClassNameFromFile(string $content): ?string {
    if (preg_match('/class\s+(\w+)/', $content, $m)) {
        return $m[1];
    }
    return null;
}

function getNamespaceFromFile(string $content): ?string {
    if (preg_match('/namespace\s+([^;]+);/', $content, $m)) {
        return trim($m[1]);
    }
    return null;
}

function getTypeFromClassName(string $className, ?string $parent): string {
    if ($className === 'tag') return 'class-core';
    if ($className === 'html_document') return 'class-core';
    if ($className === 'tag_catalog') return 'class-support';
    if ($className === 'tag_log') return 'class-support';
    if ($className === 'DOM') return 'class-static';
    if ($className === 'template') return 'class-static';
    if ($className === 'append_shotcuts') return 'trait';
    if ($className === 'common_code') return 'class-support';
    if ($className === 'on_DOM') return 'class-support';
    if ($parent === 'tag') return 'class-tag';
    if ($parent === 'bootstrap\grid_cell' || $parent === 'grid_cell') return 'class-bootstrap';
    return 'class';
}

// First pass: create nodes
foreach ($phpFiles as $filePath) {
    $content = file_get_contents($filePath);
    $className = getClassNameFromFile($content);
    $namespace = getNamespaceFromFile($content);
    
    if (!$className) {
        // Try to detect if it's a file with no class
        // Still create a node for it
        $baseName = basename($filePath, '.php');
        $nodeId = str_replace(['/', '\\'], '_', substr($filePath, strlen(__DIR__) + 1));
        $nodeId = preg_replace('/\.php$/', '', $nodeId);
        
        $docBlock = extractDocBlock($content);
        $description = $docBlock ? extractDocBlockDescription($docBlock) : 'PHP script file';
        $author = $docBlock ? extractAuthor($docBlock) : null;
        $tags = $docBlock ? extractTags($docBlock) : [];
        
        $tagArray = [];
        foreach ($tags as $tagName => $values) {
            foreach ($values as $v) {
                $tagArray[] = '@' . $tagName . ($v ? ' ' . $v : '');
            }
        }
        if ($author) {
            $tagArray[] = '@author ' . $author;
        }
        
        $nodes[] = [
            'id' => $nodeId,
            'type' => 'script',
            'name' => $baseName,
            'filePath' => substr($filePath, strlen(__DIR__) + 1),
            'summary' => substr($description, 0, 200),
            'tags' => $tagArray,
        ];
        $nodeIds[] = $nodeId;
        continue;
    }
    
    $nodeId = str_replace(['/', '\\'], '_', substr($filePath, strlen(__DIR__) + 1));
    $nodeId = preg_replace('/\.php$/', '', $nodeId);
    
    $nodeIdByClass[$className] = $nodeId;
    $nodeIds[] = $nodeId;
    
    $docBlock = extractDocBlock($content);
    $description = $docBlock ? extractDocBlockDescription($docBlock) : 'Class ' . $className;
    $author = $docBlock ? extractAuthor($docBlock) : null;
    $tags = $docBlock ? extractTags($docBlock) : [];
    
    $parent = detectInheritance($content);
    $type = getTypeFromClassName($className, $parent);
    $htmlTag = extractTagNameFromClass($content, $className);
    
    $tagArray = [];
    foreach ($tags as $tagName => $values) {
        foreach ($values as $v) {
            $tagArray[] = '@' . $tagName . ($v ? ' ' . $v : '');
        }
    }
    if ($author) {
        $tagArray[] = '@author ' . $author;
    }
    if ($htmlTag) {
        $tagArray[] = '@html-tag ' . $htmlTag;
    }
    if ($parent) {
        $tagArray[] = '@extends ' . $parent;
    }
    
    $nodes[] = [
        'id' => $nodeId,
        'type' => $type,
        'name' => $className,
        'filePath' => substr($filePath, strlen(__DIR__) + 1),
        'summary' => substr($description, 0, 200),
        'tags' => $tagArray,
    ];
}

// Second pass: create edges
foreach ($phpFiles as $filePath) {
    $content = file_get_contents($filePath);
    $className = getClassNameFromFile($content);
    if (!$className) continue;
    
    $nodeId = str_replace(['/', '\\'], '_', substr($filePath, strlen(__DIR__) + 1));
    $nodeId = preg_replace('/\.php$/', '', $nodeId);
    
    // Inheritance
    $parent = detectInheritance($content);
    if ($parent && isset($nodeIdByClass[$parent])) {
        $edges[] = [
            'source' => $nodeId,
            'target' => $nodeIdByClass[$parent],
            'type' => 'extends',
            'weight' => 1.0,
        ];
    }
    
    // Traits usage
    $traits = detectUsesTrait($content);
    foreach ($traits as $trait) {
        if (isset($nodeIdByClass[$trait])) {
            $edges[] = [
                'source' => $nodeId,
                'target' => $nodeIdByClass[$trait],
                'type' => 'uses',
                'weight' => 0.5,
            ];
        }
    }
}

// Add node for tag constants file (tag.php already has class tag, but also defines constants)
// It's already in the nodes as class 'tag'

// Build layers
$coreClassIds = [];
$htmlTagIds = [];
$traitIds = [];
$supportIds = [];
$staticIds = [];

foreach ($nodes as $node) {
    switch ($node['type']) {
        case 'class-core':
            $coreClassIds[] = $node['id'];
            break;
        case 'class-tag':
            $htmlTagIds[] = $node['id'];
            break;
        case 'trait':
            $traitIds[] = $node['id'];
            break;
        case 'class-support':
            $supportIds[] = $node['id'];
            break;
        case 'class-static':
        case 'script':
            $staticIds[] = $node['id'];
            break;
    }
}

// Reclass static/support nodes more carefully
$staticIds = [];
$supportIds = [];
foreach ($nodes as $node) {
    if ($node['type'] === 'class-static') {
        $staticIds[] = $node['id'];
    }
    if ($node['type'] === 'class-support' || $node['type'] === 'script') {
        $supportIds[] = $node['id'];
    }
}

$layers = [];

$layers[] = [
    'id' => 'layer-core',
    'name' => 'Core Framework',
    'description' => 'Foundation classes: tag, html_document, tag_catalog, tag_log, DOM wrapper, template system, notifications, and append shortcuts trait.',
    'nodeIds' => array_values(array_unique(array_merge($coreClassIds, $traitIds))),
];

$layers[] = [
    'id' => 'layer-html-tags',
    'name' => 'HTML Tag Classes',
    'description' => 'All HTML tag implementations that extend the base tag class (div, p, span, table, input, etc.).',
    'nodeIds' => array_values(array_unique($htmlTagIds)),
];

$layers[] = [
    'id' => 'layer-static-support',
    'name' => 'Static Utilities & Support',
    'description' => 'Static helper classes, template loader, notification system, and other supporting modules.',
    'nodeIds' => array_values(array_unique(array_merge($staticIds, $supportIds))),
];

// Build tour
$tour = [];

$rootNode = 'src_klan1_html_tag';
$htmlDocNode = 'src_klan1_html_html_document';
$domNode = 'src_klan1_html_DOM';
$appendNode = 'src_klan1_html_append_shotcuts';
$catalogNode = 'src_klan1_html_tag_catalog';
$templateNode = 'src_klan1_html_template';
$notificationsNode = 'src_klan1_html_notifications_common_code';
$onDomNode = 'src_klan1_html_notifications_on_DOM';

$tour[] = [
    'order' => 1,
    'title' => 'The tag Base Class',
    'description' => 'Start with tag.php — the heart of the library. It defines the tag class that manages attributes, child collections (head, main, tail), inline embedding via {{ID:N}}, and HTML generation.',
    'nodeIds' => [$rootNode],
];

$tour[] = [
    'order' => 2,
    'title' => 'Document & DOM Wrapper',
    'description' => 'Explore html_document.php which extends tag and auto-creates head/body children. Then DOM.php, a static compatibility wrapper for v1 code that provides global access to the HTML document.',
    'nodeIds' => [$htmlDocNode, $domNode],
];

$tour[] = [
    'order' => 3,
    'title' => 'Traits & Catalog',
    'description' => 'Understand append_shotcuts.php that adds fluent append_div(), append_p(), etc. And tag_catalog.php which assigns unique IDs to every tag for inline embedding and lookup.',
    'nodeIds' => [$appendNode, $catalogNode],
];

$tour[] = [
    'order' => 4,
    'title' => 'Template & Notifications',
    'description' => 'Review template.php for loading PHP template files, and the notifications system (common_code.php + on_DOM.php) for session-based message queues rendered as DOM alerts.',
    'nodeIds' => [$templateNode, $notificationsNode, $onDomNode],
];

// Collect a sample of tag nodes for the final tour step
$sampleTagNodes = array_slice($htmlTagIds, 0, 15);
$tour[] = [
    'order' => 5,
    'title' => 'HTML Tag Implementations',
    'description' => 'Browse the tag classes — each standard HTML element has its own class extending tag. Notable examples include div, p, span, table, input, form, a, img, and script.',
    'nodeIds' => $sampleTagNodes,
];

// Validate
$nodeIdSet = array_flip($nodeIds);
$issues = [];

foreach ($edges as $edge) {
    if (!isset($nodeIdSet[$edge['source']])) {
        $issues[] = "Edge source missing: " . $edge['source'];
    }
    if (!isset($nodeIdSet[$edge['target']])) {
        $issues[] = "Edge target missing: " . $edge['target'];
    }
}

foreach ($layers as $layer) {
    foreach ($layer['nodeIds'] as $nid) {
        if (!isset($nodeIdSet[$nid])) {
            $issues[] = "Layer '{$layer['name']}' references missing node: {$nid}";
        }
    }
}

foreach ($tour as $step) {
    foreach ($step['nodeIds'] as $nid) {
        if (!isset($nodeIdSet[$nid])) {
            $issues[] = "Tour step '{$step['title']}' references missing node: {$nid}";
        }
    }
}

$graph = [
    'version' => '1.0.0',
    'project' => [
        'name' => 'k1lib.html',
        'languages' => ['php'],
        'frameworks' => [],
        'description' => 'A PHP 8.2+ library that generates HTML documents using an object-oriented, DOM-like approach. Every HTML tag is represented by a PHP object that can be nested, queried, and rendered to a string.',
        'analyzedAt' => $analyzedAt,
        'gitCommitHash' => $gitCommit,
    ],
    'nodes' => $nodes,
    'edges' => $edges,
    'layers' => $layers,
    'tour' => $tour,
];

$outputFile = __DIR__ . '/.understand-anything/knowledge-graph.json';
file_put_contents($outputFile, json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "Node count: " . count($nodes) . "\n";
echo "Edge count: " . count($edges) . "\n";
echo "Layer count: " . count($layers) . "\n";
echo "Tour steps: " . count($tour) . "\n";
echo "Issues: " . count($issues) . "\n";
if (!empty($issues)) {
    foreach ($issues as $issue) {
        echo "  - {$issue}\n";
    }
}
echo "Output: {$outputFile}\n";
