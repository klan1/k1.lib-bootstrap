<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Callout component
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/callout.mdx
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

        parent::__construct("alert alert-{$type}" . ($closable ? ' alert-dismissible fade show' : ''), NULL);
        $this->set_attrib("role", "alert");
        if ($closable) {
            $this->set_class('position-relative', TRUE);
            $close_button = new \k1lib\html\button();
            $close_button->set_class('btn-close position-absolute top-0 end-0');
            $close_button->set_attrib("data-bs-dismiss", "alert");
            $close_button->set_attrib("aria-label", "Close");
            $close_button->set_attrib("type", "button");
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
        $content = '';
        if (!empty($this->title)) {
            $content .= "<h6 class=\"alert-heading\">{$this->title}</h6>";
        }
        if (!empty($this->message)) {
            $content .= $this->message;
        }
        $this->set_value($content);

        if (!empty($this->margin)) {
            $this->set_attrib("style", "margin: {$this->margin}");
        }

        return parent::generate($with_childs, $n_childs);
    }
}
