<?php
$component_name = 'Accordion';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Accordion</h2>
    <div class="component-ref">\k1lib\html\bootstrap\accordion &rarr; src/klan1/html/bootstrap/accordion.php</div>

    <div class="preview-label">Default (One open at a time)</div>
    <div class="preview-box">
        <?php
        $accordion = new \k1lib\html\bootstrap\accordion('demo-default');
        $accordion->add_item('First Item', '<p>This is the first item\'s body content.</p>', 'item-1', false);
        $accordion->add_item('Second Item', '<p>This is the second item\'s body content.</p>', 'item-2', false);
        $accordion->add_item('Third Item', '<p>This is the third item\'s body content.</p>', 'item-3', false);
        echo $accordion->generate();
        ?>
    </div>

    <div class="preview-label">Open by default</div>
    <div class="preview-box">
        <?php
        $accordion2 = new \k1lib\html\bootstrap\accordion('demo-default-open');
        $accordion2->add_item('First Item', '<p>Content</p>', 'item-1', true);
        $accordion2->add_item('Second Item', '<p>Content</p>', 'item-2', false);
        echo $accordion2->generate();
        ?>
    </div>

    <div class="preview-label">Flush (Edge-to-edge)</div>
    <div class="preview-box">
        <?php
        $accordion3 = new \k1lib\html\bootstrap\accordion('demo-flush', \k1lib\html\bootstrap\accordion::MODE_DEFAULT, true);
        $accordion3->add_item('Flush Item 1', '<p>No borders or rounded corners.</p>', 'flush-1', false);
        $accordion3->add_item('Flush Item 2', '<p>Edge-to-edge with parent container.</p>', 'flush-2', false);
        echo $accordion3->generate();
        ?>
    </div>

    <div class="preview-label">Always Open (Multiple can be open)</div>
    <div class="preview-box">
        <?php
        $accordion4 = new \k1lib\html\bootstrap\accordion('demo-always', \k1lib\html\bootstrap\accordion::MODE_ALWAYS_OPEN);
        $accordion4->add_item('Always Item 1', '<p>Can have multiple open at once.</p>', 'always-1', false);
        $accordion4->add_item('Always Item 2', '<p>No data-bs-parent restriction.</p>', 'always-2', true);
        $accordion4->add_item('Always Item 3', '<p>All can be open simultaneously.</p>', 'always-3', false);
        echo $accordion4->generate();
        ?>
    </div>

    <div class="preview-label">With add_items() array</div>
    <div class="preview-box">
        <?php
        $accordion5 = new \k1lib\html\bootstrap\accordion('demo-array');
        $accordion5->add_items([
            ['title' => 'Array Item 1', 'content' => '<p>Added via array.</p>', 'id' => 'arr-1', 'default_open' => true],
            ['title' => 'Array Item 2', 'content' => '<p>Using add_items().</p>', 'id' => 'arr-2'],
            ['title' => 'Array Item 3', 'content' => '<p>Configurable per item.</p>', 'id' => 'arr-3'],
        ]);
        echo $accordion5->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Default accordion (one open at a time)</span>
<span class="text-warning">$accordion</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\accordion(<span class="text-success">'demo'</span>);
<span class="text-warning">$accordion</span>-><span class="text-light">add_item</span>(<span class="text-success">'Title'</span>, <span class="text-success">'<p>Content</p>'</span>, <span class="text-success">'item-1'</span>, <span class="text-info">false</span>);
<span class="text-warning">$accordion</span>-><span class="text-light">add_item</span>(<span class="text-success">'Second'</span>, <span class="text-success">'<p>Content</p>'</span>, <span class="text-success">'item-2'</span>, <span class="text-info">false</span>);

<span class="text-primary">// Always open mode (multiple can be open)</span>
<span class="text-warning">$accordion</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\accordion(
    <span class="text-success">'demo'</span>,
    \k1lib\html\bootstrap\accordion::<span class="text-light">MODE_ALWAYS_OPEN</span>
);

<span class="text-primary">// Flush variant</span>
<span class="text-warning">$accordion</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\accordion(
    <span class="textsuccess">'demo'</span>,
    \k1lib\html\bootstrap\accordion::<span class="text-light">MODE_DEFAULT</span>,
    <span class="text-info">true</span>  <span class="text-secondary">// flush</span>
);

<span class="text-primary">// Open by default</span>
<span class="text-warning">$accordion</span>-><span class="text-light">add_item</span>(<span class="text-success">'Title'</span>, <span class="text-success">'<p>Content</p>'</span>, <span class="text-success">'id'</span>, <span class="text-info">true</span>);

<span class="text-primary">// Add multiple at once</span>
<span class="text-warning">$accordion</span>-><span class="text-light">add_items</span>([
    [<span class="textsuccess">'title'</span> => <span class="text-success">'Item 1'</span>, <span class="textsuccess">'content'</span> => <span class="text-success">'<p>Content</p>'</span>, <span class="textsuccess">'id'</span> => <span class="text-success">'item-1'</span>, <span class="textsuccess">'default_open'</span> => <span class="text-info">true</span>],
    [<span class="textsuccess">'title'</span> => <span class="textsuccess">'Item 2'</span>, ...],
]);

<span class="text-warning">echo</span> <span class="text-warning">$accordion</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
