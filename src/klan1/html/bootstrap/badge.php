<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Badge component
 *
 * A small, flexible component for highlighting counts, labels, or metadata.
 * Badges can be rendered as pills (rounded) or regular badges, and support
 * all Bootstrap color variants.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/badge.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class badge extends \k1lib\html\span {

    /**
     * Creates a new Badge instance
     *
     * @param string $text The badge text content (e.g., "New", "5", "Pending")
     * @param string $type Bootstrap color type (primary, secondary, success, danger, warning, info, light, dark)
     * @param bool $pill Render as pill-shaped badge (rounded-pill class)
     */
    public function __construct($text, $type = 'primary', $pill = FALSE) {
        $class = $pill ? "badge rounded-pill text-bg-{$type}" : "badge text-bg-{$type}";
        parent::__construct($class, NULL);
        $this->set_value($text);
    }
}