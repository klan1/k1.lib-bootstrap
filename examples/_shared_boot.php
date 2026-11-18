<?php
/**
 * Shared examples bootstrap
 *
 * Resolves the k1.lib-html shared examples directory through Composer's
 * autoloader, so no relative paths between projects are needed.
 *
 * @license Apache-2.0
 */

$loader = require_once __DIR__ . '/../vendor/autoload.php';

if (!defined('K1LIB_HTML_EXAMPLES_SHARED')) {
    $prefixes = $loader->getPrefixesPsr4();
    $prefixDirs = $prefixes['k1lib\\html\\'] ?? [];
    if (!empty($prefixDirs)) {
        $packageRoot = dirname($prefixDirs[0], 3);
        define('K1LIB_HTML_EXAMPLES_SHARED', $packageRoot . '/examples/_shared/');
    }
}
