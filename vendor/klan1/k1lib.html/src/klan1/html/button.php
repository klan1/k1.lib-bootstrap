<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <button> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class button extends tag {

    use append_shotcuts;

    /**
     * @param string|null $value
     * @param string|null $class
     * @param string|null $id
     * @param string $type
     */
    function __construct($value = NULL, $class = NULL, $id = NULL, $type = "button") {
        parent::__construct("button", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class);
        $this->set_id($id);
        if (!empty($type)) {
            $this->set_attrib("type", $type);
        }
    }
}
