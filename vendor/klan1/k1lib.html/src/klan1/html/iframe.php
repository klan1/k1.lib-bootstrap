<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <iframe> inline frame element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class iframe extends tag {

    use append_shotcuts;

    /**
     * @param string $src
     * @param string|null $class
     * @param string|null $id
     */
    function __construct($src, $class = NULL, $id = NULL) {
        parent::__construct("iframe", IS_NOT_SELF_CLOSED);
        $this->set_value($src);
        $this->set_class($class);
        $this->set_id($id);
    }

    public function set_value($value, $append = FALSE) {
        $this->set_attrib("src", $value);
        return $this;
    }
}
