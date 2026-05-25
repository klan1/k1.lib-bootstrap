<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <pre> preformatted text element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class pre extends tag {

    use append_shotcuts;

    /**
     * @param string $value
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value, $class = NULL, $id = NULL) {
        parent::__construct("pre", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class);
        $this->set_id($id);
    }
}
