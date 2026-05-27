<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Toast component
 *
 * Lightweight push notifications for displaying brief, auto-dismissing
 * messages to users. Toasts appear temporarily without interrupting
 * the user experience and can be configured with a header, body content,
 * and automatic dismissal timing.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/toast.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class toast extends \k1lib\html\div {

    /**
     * Creates a new Toast instance
     *
     * @param string $header Toast header/title text
     * @param string $body Toast body content
     * @param bool $autohide Automatically hide the toast after the delay
     * @param int $delay Time in milliseconds before auto-hide (default: 5000)
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
            $header_span = new \k1lib\html\span('me-auto');
            $header_span->set_value($header);
            $header_div->append_child($header_span);
        }
        $close_btn = new \k1lib\html\button('×');
        $close_btn->set_class('btn-close');
        $close_btn->set_attrib('data-bs-dismiss', 'toast');
        $close_btn->set_attrib('aria-label', 'Close');
        $close_btn->set_attrib('type', 'button');
        $header_div->append_child($close_btn);

        $body_div = new \k1lib\html\div('toast-body');
        $body_div->set_value($body);

        $this->append_child($header_div);
        $this->append_child($body_div);
    }
}