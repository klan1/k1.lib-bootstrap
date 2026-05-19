<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Callout component
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 */

class callout extends \k1lib\html\div {

    use bootstrap_methods;

    /**
     * @var grid_cell[]
     */
    protected $cols = [];
    protected $title = "";
    protected $message = "no message";
    protected $margin = '';

    function __construct($message = NULL, $title = NULL, $closable = TRUE, $type = "primary") {
        $this->message = $message;
        $this->title = $title;

        parent::__construct("alert alert-{$type}", NULL);
        $this->set_attrib("role", "alert");
        if ($closable) {
            $close_button = new \k1lib\html\button(NULL, "btn-close");
            $close_button->set_attrib("data-bs-dismiss", "alert");
            $close_button->set_attrib("aria-label", "Close");
            $this->append_child_tail($close_button);
        }

        $this->set_class("alert-{$type}");
    }

    public function set_class($class, $append = FALSE) {
        if ($append === FALSE) {
            $class = "alert {$class}";
        }
        parent::set_class($class, $append);
    }

    public function set_margin($margin) {
        $this->margin = $margin;
    }

    public function get_message() {
        return $this->message;
    }

    public function set_message($message) {
        $this->message = $message;
    }

    function get_title() {
        return $this->title;
    }

    function set_title($title) {
        $this->title = $title;
    }

    public function generate($with_childs = \TRUE, $n_childs = 0) {
        if (!empty($this->title)) {
            $h6 = new \k1lib\html\h6($this->title);
            $h6->set_class('alert-heading');
            $this->prepend_child($h6);
        }

        if (!empty($this->message)) {
            $this->append_child($this->message);
        }

        if (!empty($this->margin)) {
            $this->set_attrib("style", "margin: {$this->margin}");
        }

        return parent::generate($with_childs, $n_childs);
    }
}
