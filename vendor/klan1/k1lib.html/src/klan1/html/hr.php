<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <hr> horizontal rule element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class hr extends tag {

    /**
     */
    function __construct() {
        parent::__construct("hr", IS_SELF_CLOSED);
    }
}
