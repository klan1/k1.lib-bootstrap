<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Badge component
 *
 * Small count and labeling component for highlighting content.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class badge extends \k1lib\html\span {

    /**
     * @param string $text Badge text
     * @param string $type Color type (primary, secondary, success, danger, warning, info, light, dark)
     * @param bool $pill Render as pill badge
     */
    public function __construct($text, $type = 'primary', $pill = FALSE) {
        $class = $pill ? "badge rounded-pill bg-{$type}" : "badge bg-{$type}";
        parent::__construct($class, NULL);
        $this->set_value($text);
    }
}