<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap assets helper
 *
 * Enqueues the Bootstrap CSS and JS bundle once through the asset manager.
 *
 * @license Apache-2.0
 */
trait bootstrap_assets {

    /**
     * Enqueues Bootstrap CSS and JS if not already queued.
     *
     * @return void
     */
    public static function require_assets(): void {
        // [Klan1-Developer IA] Added automatic Bootstrap asset loading
        \k1lib\html\asset_manager::enqueue('bootstrap', 'bootstrap.min.css', 'head');
        // [Klan1-Developer IA] Use cache-busted icon stylesheet
        \k1lib\html\asset_manager::enqueue('bootstrap', 'bootstrap-icons.min.v2.css', 'head');
        \k1lib\html\asset_manager::enqueue('bootstrap', 'bootstrap.bundle.min.js', 'body');
    }
}
