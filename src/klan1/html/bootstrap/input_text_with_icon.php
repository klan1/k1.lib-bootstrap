<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Input with Icon component
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/forms.mdx
 * @license Apache-2.0
 */

use k1lib\html\div;
use k1lib\html\input as input_tag;

class input_text_with_icon extends div {

    use bootstrap_methods;

    private input_tag $input;

    public function __construct($name, $value, $icon = null, $position = 'left') {
        parent::__construct('form-group position-relative has-icon-' . $position);

        $this->input = new input_tag('text', $name, $value, 'form-control');
        $this->input->append_to($this);

        $this->append_div('form-control-icon')->append_i(NULL, $icon);
        $this->link_value_obj($this->input);
    }

    public function input(): input_tag {
        return $this->input;
    }
}
