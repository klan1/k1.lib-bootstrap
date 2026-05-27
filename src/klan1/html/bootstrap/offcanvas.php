<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Offcanvas component
 *
 * A side panel that slides in from the edge of the screen. Unlike modals,
 * offcanvases are often used for navigation menus, filters, or settings
 * panels. Supports placement on the start (left), end (right), top, or bottom.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/offcanvas.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class offcanvas extends \k1lib\html\div {

    /**
     * Creates a new Offcanvas instance
     *
     * @param string $placement Panel position: 'start' (left), 'end' (right), 'top', or 'bottom'
     * @param string $title Title displayed in the offcanvas header
     * @param string $content Body HTML content
     */
    public function __construct($placement = 'start', $title = 'Offcanvas', $content = '') {
        parent::__construct("offcanvas offcanvas-{$placement}", "offcanvas-{$placement}");
        $this->set_attrib('tabindex', '-1');

        $header = new \k1lib\html\div('offcanvas-header');
        $h5 = $header->append_h5($title, 'offcanvas-title');
        $close_btn = new \k1lib\html\button('&times;', NULL);
        $close_btn->set_class('btn-close');
        $close_btn->set_attrib('data-bs-dismiss', 'offcanvas');
        $close_btn->set_attrib('aria-label', 'Close');
        $close_btn->set_attrib('type', 'button');

        $body = new \k1lib\html\div('offcanvas-body');
        $body->set_value($content);

        $this->append_child($header);
        $header->append_child_tail($close_btn);
        $this->append_child($body);
    }
}