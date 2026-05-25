<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <table> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class table extends tag {

    use append_shotcuts;

    /**
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($class = NULL, $id = NULL) {
        parent::__construct("table", IS_NOT_SELF_CLOSED);
//        $this->data_array &= $data_array;
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * Chains a new <THEAD> HTML TAG
     * @param string $class
     * @param string $id
     * @return thead
     */
    function append_thead($class = NULL, $id = NULL) {
        $child_object = new thead($class, $id);
        $this->append_child($child_object);
        return $child_object;
    }

    /**
     * Chains a new <TBODY> HTML TAG
     * @param string $class
     * @param string $id
     * @return tbody
     */
    function append_tbody($class = NULL, $id = NULL) {
        $child_object = new tbody($class, $id);
        $this->append_child($child_object);
        return $child_object;
    }
}
