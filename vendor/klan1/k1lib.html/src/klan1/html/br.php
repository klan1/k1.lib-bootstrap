<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <br> line break element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class br extends tag {

    /**
     */
    function __construct() {
        parent::__construct("br", IS_SELF_CLOSED);
    }
}
