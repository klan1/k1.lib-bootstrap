<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <tr> table row element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class tr extends tag {

    use append_shotcuts;

    /**
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("tr", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Chains a new <TH> HTML TAG
     * @param string $value <TAG>$value</TAG>
     * @param string $class
     * @param string $id
     * @return th
     */
    function append_th($value, $class = NULL, $id = NULL) {
        $child_object = new th($value, $class, $id);
        $this->append_child($child_object);
        return $child_object;
    }

    /**
     * Chains a new <TD> HTML TAG
     * @param string $value <TAG>$value</TAG>
     * @param string $class
     * @param string $id
     * @return td
     */
    function append_td($value, $class = NULL, $id = NULL) {
        $child_object = new td($value, $class, $id);
        $this->append_child($child_object);
        return $child_object;
    }
}
