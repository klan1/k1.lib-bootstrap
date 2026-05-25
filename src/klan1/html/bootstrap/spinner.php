<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Spinner component
 *
 * Animated loading indicator with grow and border variants.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/spinners.mdx
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
        $size_class = '';
        if ($size === 'sm') {
            $size_class = 'spinner-' . $type . '-sm';
        }
        $class = trim("spinner-{$type} {$size_class} text-{$color}");
        parent::__construct($class, NULL);
        $this->set_attrib('role', 'status');
        $visuallyHidden = new \k1lib\html\span('visually-hidden');
        $visuallyHidden->set_value('Loading...');
        $this->append_child($visuallyHidden);

        if ($centered) {
            $wrapper = new \k1lib\html\div('d-flex justify-content-center align-items-center');
            $wrapper->append_child($this);
            return;
        }
    }
}