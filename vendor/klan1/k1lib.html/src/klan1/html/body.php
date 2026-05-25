<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <body> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class body extends tag {

    use append_shotcuts;

    function __construct() {
        parent::__construct("body", IS_NOT_SELF_CLOSED);
    }
}
