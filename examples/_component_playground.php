<?php
require_once __DIR__ . '/_shared_boot.php';
$title = ($component_name ?? 'Component') . ' - k1.lib-bootstrap';
$description = $description ?? '';
$assets = ['/resources/bootstrap/bootstrap.min.css', '/resources/bootstrap/bootstrap-icons.min.v2.css'];
$scripts = ['/resources/bootstrap/bootstrap.bundle.min.js'];
$initial_snippet = $snippet ?? '';

$snippet_urls = [];
foreach (glob(__DIR__ . '/components/*.php') as $file) {
    $name = basename($file, '.php');
    $snippet_urls[$name] = '/components/' . $name . '.php';
}
$snippet_urls['table'] = '/components/table_from_data.php';
$snippet_urls['group'] = '/playground.php?file=group';

require_once K1LIB_HTML_EXAMPLES_SHARED . 'playground.php';
