<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <label> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class label extends tag {

    use append_shotcuts;

    /**
     * @param string $label <TAG>$value</TAG>
     * @param string|null $for
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($label, $for, $class = NULL, $id = NULL) {
        parent::__construct("label", IS_NOT_SELF_CLOSED);
        $this->set_value($label);
        if (!empty($for)) {
            $this->set_attrib("for", $for);
        }
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
