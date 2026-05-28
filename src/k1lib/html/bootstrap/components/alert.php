<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Alert component
 *
 * Displays contextual feedback messages for typical user actions such as
 * success, warning, error, or informational notices. Supports dismissible
 * alerts with a close button and optional heading text.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/alert.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class alert extends \k1lib\html\div {

    use bootstrap_methods;

    /**
     * Whether the alert can be dismissed
     * @var bool
     */
    protected $dismissible = FALSE;

    /**
     * Optional heading element
     * @var \k1lib\html\h4|null
     */
    protected $heading = NULL;

    /**
     * The alert message text
     * @var string
     */
    protected $message = '';

    /**
     * Creates a new Alert instance
     *
     * @param string $message The alert text content
     * @param string $type Bootstrap color type (primary, secondary, success, danger, warning, info, light, dark)
     * @param bool $dismissible Enable the close button to dismiss the alert
     */
    public function __construct($message, $type = 'primary', $dismissible = FALSE) {
        parent::__construct("alert alert-{$type}" . ($dismissible ? ' alert-dismissible fade show position-relative' : ''), NULL);
        $this->set_attrib('role', 'alert');
        $this->dismissible = $dismissible;
        $this->message = $message;

        if ($dismissible) {
            $close_btn = new \k1lib\html\button();
            $close_btn->set_class('btn-close position-absolute top-0 end-0');
            $close_btn->set_attrib('data-bs-dismiss', 'alert');
            $close_btn->set_attrib('aria-label', 'Close');
            $close_btn->set_attrib('type', 'button');
            $this->append_child_tail($close_btn);
        }
    }

    /**
     * Sets the alert heading
     *
     * Adds a heading element above the message with Bootstrap's alert-heading class.
     *
     * @param string $heading The heading text to display
     * @return $this For method chaining
     */
    public function set_heading($heading): static {
        $this->heading = new \k1lib\html\h4($heading, NULL);
        $this->heading->set_class('alert-heading');
        $this->append_child($this->heading);
        return $this;
    }

    /**
     * Generates the complete alert HTML
     *
     * @param bool $with_childs Include child elements in output
     * @param int $n_childs Number of children to include (0 = all)
     * @return string The rendered HTML
     */
    public function generate($with_childs = \TRUE, $n_childs = 0): string {
        if (!empty($this->heading)) {
            $this->append_child($this->heading);
            $p = new \k1lib\html\p($this->message);
            $this->append_child($p);
        } else {
            $this->set_value($this->message);
        }
        return parent::generate($with_childs, $n_childs);
    }
}