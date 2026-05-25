<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <nav> navigation element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class nav extends tag {

    use append_shotcuts;

    /**
     * @param string|null $value
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value = NULL, $class = NULL, $id = NULL) {
        parent::__construct("nav", IS_NOT_SELF_CLOSED);
        $this->set_attrib('aria-label', $value);
        $this->set_class($class);
        $this->set_id($id);
    }
}
