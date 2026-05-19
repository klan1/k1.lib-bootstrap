<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Toast component
 *
 * Lightweight push notifications for small amounts of temporary content.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class toast extends \k1lib\html\div {

    /**
     * @param string $header Toast header text
     * @param string $body Toast body content
     * @param bool $autohide Auto-hide after delay
     * @param int $delay Hide delay in milliseconds
     */
    public function __construct($header = '', $body = '', $autohide = TRUE, $delay = 5000) {
        parent::__construct('toast', 'toast-' . uniqid());
        $this->set_attrib('role', 'alert');
        $this->set_attrib('aria-live', 'assertive');
        $this->set_attrib('aria-atomic', 'true');

        if ($autohide) {
            $this->set_attrib('data-bs-autohide', 'true');
            $this->set_attrib('data-bs-delay', $delay);
        } else {
            $this->set_attrib('data-bs-autohide', 'false');
        }

        $header_div = new \k1lib\html\div('toast-header');
        if ($header) {
            $header_div->append_span($header, 'me-auto');
        }
        $close_btn = new \k1lib\html\button('&times;', NULL);
        $close_btn->set_class('btn-close');
        $close_btn->set_attrib('data-bs-dismiss', 'toast');
        $close_btn->set_attrib('aria-label', 'Close');
        $header_div->append_child($close_btn);

        $body_div = new \k1lib\html\div('toast-body');
        $body_div->set_value($body);

        $this->append_child($header_div);
        $this->append_child($body_div);
    }
}