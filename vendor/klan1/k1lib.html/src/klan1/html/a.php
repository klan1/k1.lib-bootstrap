<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <a> anchor element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class a extends tag {

    use append_shotcuts;

    function __construct($href, $label, $target = NULL, $class = NULL, $id = NULL) {
        parent::__construct("a", IS_NOT_SELF_CLOSED);
        if (!empty($href)) {
            $this->set_attrib("href", $href);
        }
        if (!empty($label)) {
            $this->set_value($label);
        }
        if (!empty($target)) {
            $this->set_attrib("target", $target);
        }
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    function set_href(string $href) {
        $this->set_attrib("href", $href);
        return $this;
    }

    function get_href() {
        return $this->get_attribute("href");
    }
}
