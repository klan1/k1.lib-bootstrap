<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <tbody> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class tbody extends tag {

    use append_shotcuts;

    /**
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("tbody", IS_NOT_SELF_CLOSED);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Chains a new <TR> HTML TAG
     * @param string $class
     * @param string $id
     * @return tr
     */
    function append_tr($class = NULL, $id = NULL) {
        $child_object = new tr($class, $id);
        $this->append_child($child_object);
        return $child_object;
    }
}
