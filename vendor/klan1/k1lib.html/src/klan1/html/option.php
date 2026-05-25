<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <option> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class option extends tag {

    use append_shotcuts;

    /**
     * @param string $value <TAG value='$value' />
     * @param string $label <TAG>$label</TAG>
     * @param bool $selected
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value, $label, $selected = FALSE, $class = NULL, $id = NULL) {
        parent::__construct("option", IS_NOT_SELF_CLOSED);
        $this->set_value($label);
        $this->set_attrib("value", $value);
        if ($selected) {
            $this->set_attrib("selected", $selected);
        }
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
