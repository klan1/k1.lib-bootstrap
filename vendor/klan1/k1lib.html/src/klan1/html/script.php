<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <script> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class script extends tag {

    use append_shotcuts;

    /**
     * Create a SCRIPT html tag with VALUE as data. Use $script->set_value($crs) for load a file.
     *
     * @param string|null $src
     */
    function __construct($src = NULL) {
        parent::__construct("script", IS_NOT_SELF_CLOSED);
        if (!empty($src)) {
            $this->set_attrib("src", $src);
        }
    }
}
