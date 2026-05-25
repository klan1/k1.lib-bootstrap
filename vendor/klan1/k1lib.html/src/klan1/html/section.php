<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <section> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class section extends tag {

    use append_shotcuts;

    /**
     * @param string|null $id
     * @param string|null $class
     */
    function __construct($id = NULL, $class = NULL) {
        parent::__construct("section", IS_NOT_SELF_CLOSED);
        if (!empty($id)) {
            $this->set_attrib("id", $id);
        }
        if (!empty($class)) {
            $this->set_attrib("class", $class);
        }
    }
}
