<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <li> list item element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class li extends tag {

    use append_shotcuts;

    /**
     * Create a LI html tag with VALUE as data. Use $div->set_value($data)
     *
     * @param string|null $value
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($value = NULL, $class = NULL, $id = NULL) {
        parent::__construct("li", IS_NOT_SELF_CLOSED);
//        $this->data_array &= $data_array;
        $this->set_value($value);
        $this->set_class($class, TRUE);
        $this->set_id($id);
    }

    /**
     * 
     * @param string $class
     * @param string $id
     * @return ul
     */
    function append_ul($class = NULL, $id = NULL) {
        $new = new ul($class, $id);
        $this->append_child($new);
        return $new;
    }

    /**
     * 
     * @param string $class
     * @param string $id
     * @return div
     */
    function append_ol($class = NULL, $id = NULL) {
        $new = new ol($class, $id);
        $this->append_child($new);
        return $new;
    }
}
