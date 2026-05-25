<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * HTML <fieldset> element
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class fieldset extends tag {

    use append_shotcuts;

    /**
     * @param string $legend
     */
    function __construct($legend) {
        parent::__construct("fieldset", IS_NOT_SELF_CLOSED);
        $this->set_class("fieldset");
        $legend = new legend($legend);
        $this->append_child($legend);
    }
}
