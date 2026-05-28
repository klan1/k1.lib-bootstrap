<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Callout component
 *
 * A customizable callout box for displaying important notes, tips, or notices.
 * Similar to Bootstrap alerts but styled for documentation-style messages.
 * Supports closable (dismissible) instances and optional title.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/callout.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class callout extends \k1lib\html\div {

    use bootstrap_methods;

    /**
     * Grid cells for multi-column layouts
     * @var grid_cell[]
     */
    protected $cols = [];

    /**
     * Callout title text
     * @var string
     */
    protected $title = "";

    /**
     * Callout message/body content
     * @var string
     */
    protected $message = "no message";

    /**
     * CSS margin value
     * @var string
     */
    protected $margin = '';

    /**
     * Creates a new Callout instance
     *
     * @param string|null $message The callout body content
     * @param string|null $title Optional title displayed at the top
     * @param bool $closable Enable close button to dismiss the callout
     * @param string $type Bootstrap color type (primary, secondary, success, danger, warning, info, light, dark)
     */
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

    /**
     * Sets the CSS class
     *
     * @param string $class CSS class name
     * @param bool $append Whether to append or replace existing classes
     */
    public function set_class($class, $append = FALSE) {
        if ($append === FALSE) {
            $class = "alert {$class}";
        }
        parent::set_class($class, $append);
    }

    /**
     * Sets the CSS margin
     *
     * @param string $margin CSS margin value (e.g., "10px", "1rem 2rem")
     */
    public function set_margin($margin) {
        $this->margin = $margin;
    }

    /**
     * Gets the callout message
     *
     * @return string The message content
     */
    public function get_message() {
        return $this->message;
    }

    /**
     * Sets the callout message
     *
     * @param string $message The message content
     */
    public function set_message($message) {
        $this->message = $message;
    }

    /**
     * Gets the callout title
     *
     * @return string The title text
     */
    function get_title() {
        return $this->title;
    }

    /**
     * Sets the callout title
     *
     * @param string $title The title text
     */
    function set_title($title) {
        $this->title = $title;
    }

    /**
     * Generates the complete callout HTML
     *
     * @param bool $with_childs Include child elements in output
     * @param int $n_childs Number of children to include (0 = all)
     * @return string The rendered HTML
     */
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