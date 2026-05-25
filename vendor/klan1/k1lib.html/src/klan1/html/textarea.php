<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <textarea> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class textarea extends tag {

    use append_shotcuts;

    /**
     * @param string $name
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($name, $class = NULL, $id = NULL) {
        parent::__construct("textarea", IS_NOT_SELF_CLOSED);
        $this->set_attrib("name", $name);
        $this->set_class($class, TRUE);
        $this->set_id($id);
        $this->set_attrib("rows", 10);
    }
}
