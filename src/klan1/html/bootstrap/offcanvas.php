<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Offcanvas component
 *
 * Hidden sidebar that slides in from the edge of the screen.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class offcanvas extends \k1lib\html\div {

    /**
     * @param string $id Unique offcanvas identifier
     * @param string $title Title shown in header
     * @param string $placement Side (start, end, top, bottom)
     * @param string $content Body HTML content
     */
    public function __construct($id, $title = 'Offcanvas', $placement = 'start', $content = '') {
        parent::__construct("offcanvas offcanvas-{$placement}", "offcanvas-{$id}");
        $this->set_attrib('tabindex', '-1');

        $header = new \k1lib\html\div('offcanvas-header');
        $h5 = $header->append_h5($title, 'offcanvas-title');
        $close_btn = new \k1lib\html\button('&times;', NULL);
        $close_btn->set_class('btn-close text-reset');
        $close_btn->set_attrib('data-bs-dismiss', 'offcanvas');
        $close_btn->set_attrib('aria-label', 'Close');
        $header->append_child_tail($close_btn);

        $body = new \k1lib\html\div('offcanvas-body');
        $body->set_value($content);

        $this->append_child($header);
        $this->append_child($body);
    }
}