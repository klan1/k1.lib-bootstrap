<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <td> table data cell element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class td extends tag {

    use append_shotcuts;

    /**
     * @param string $value <TAG>$value</TAG>
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value, $class = NULL, $id = NULL) {
        parent::__construct("td", IS_NOT_SELF_CLOSED);
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }
}
