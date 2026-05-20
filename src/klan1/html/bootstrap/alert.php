<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Alert component
 *
 * Provides contextual feedback messages for typical user actions.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/alert.mdx
 * @license Apache-2.0
 * @version BETA
 */
class alert extends \k1lib\html\div {

    use bootstrap_methods;

    protected $dismissible = FALSE;
    protected $heading = NULL;
    protected $message = '';

    /**
     * @param string $message Alert text content
     * @param string $type Color type (primary, secondary, success, danger, warning, info, light, dark)
     * @param bool $dismissible Enable dismiss button
     */
    public function __construct($message, $type = 'primary', $dismissible = FALSE) {
        parent::__construct("alert alert-{$type}" . ($dismissible ? ' alert-dismissible fade show position-relative' : ''), NULL);
        $this->set_attrib('role', 'alert');
        $this->dismissible = $dismissible;
        $this->message = $message;

        if ($dismissible) {
            $close_btn = new \k1lib\html\button(NULL, 'btn-close position-absolute top-0 end-0');
            $close_btn->set_attrib('data-bs-dismiss', 'alert');
            $close_btn->set_attrib('aria-label', 'Close');
            $this->append_child_tail($close_btn);
        }
    }

    /**
     * @param string $heading Optional alert heading
     * @return $this
     */
    public function set_heading($heading) {
        $this->heading = new \k1lib\html\h4($heading, NULL);
        $this->heading->set_class('alert-heading');
        $this->append_child($this->heading);
        return $this;
    }

    public function generate($with_childs = \TRUE, $n_childs = 0) {
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