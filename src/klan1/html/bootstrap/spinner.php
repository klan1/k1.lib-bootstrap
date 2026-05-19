<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Spinner component
 *
 * Animated loading indicator with grow and border variants.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class spinner extends \k1lib\html\div {

    /**
     * @param string $type Spinner type (border, grow)
     * @param string $color Color (primary, secondary, success, danger, warning, info, light, dark)
     * @param string $size Size (sm, md, lg)
     * @param bool $centered Center the spinner
     */
    public function __construct($type = 'border', $color = 'primary', $size = 'md', $centered = FALSE) {
        $size_class = $size === 'sm' ? 'spinner-' . $size : '';
        $class = "spinner-{$type} {$size_class} text-{$color}";
        $id = $centered ? 'spinner-' . uniqid() : NULL;
        parent::__construct($class, $id);

        if ($centered) {
            $parent = new \k1lib\html\div('d-flex justify-content-center');
            $parent->append_child($this);
        }
    }
}