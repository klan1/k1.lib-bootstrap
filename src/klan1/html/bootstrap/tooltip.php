<?php

namespace k1\lib\html\bootstrap;

/**
 * Bootstrap 5 Tooltip component
 *
 * Small pop-up hints that appear on hover over an element.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class tooltip extends \k1lib\html\span {

    /**
     * @param \k1lib\html\tag $target Element to attach tooltip to
     * @param string $text Tooltip text content
     * @param string $placement Position (top, bottom, left, right)
     * @param bool $html Allow HTML content in tooltip
     */
    public function __construct($target, $text, $placement = 'top', $html = FALSE) {
        parent::__construct('', NULL);

        $target->set_attrib('data-bs-toggle', 'tooltip');
        $target->set_attrib('data-bs-placement', $placement);
        $target->set_attrib('title', $text);

        if ($html) {
            $target->set_attrib('data-bs-html', 'true');
        }
    }
}