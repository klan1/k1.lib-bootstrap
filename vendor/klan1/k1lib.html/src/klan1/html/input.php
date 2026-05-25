<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <input> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class input extends tag {

    use append_shotcuts;

    /**
     * @param string $type Should be HTML standars: text, button....
     * @param string $name
     * @param string $value <TAG value='$value' />
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($type, $name, $value, $class = NULL, $id = NULL) {
        parent::__construct("input", IS_SELF_CLOSED);
        $this->set_attrib("type", $type);
        $this->set_attrib("name", $name);
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
