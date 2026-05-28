<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Input with Icon component
 *
 * A text input field with an integrated icon positioned either to the
 * left or right. Common patterns include search inputs with a magnifying
 * glass icon or email inputs with an envelope icon.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/input-group.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */

use k1lib\html\div;
use k1lib\html\input as input_tag;

class input_text_with_icon extends div {

    use bootstrap_methods;

    /**
     * The input element
     * @var input_tag
     */
    private input_tag $input;

    /**
     * Creates a new Input with Icon instance
     *
     * @param string $name Input name attribute
     * @param string $value Initial input value
     * @param string|null $icon Icon class name (e.g., 'bi bi-search' for Bootstrap Icons)
     * @param string $position Icon position: 'left' or 'right'
     */
    public function __construct($name, $value, $icon = null, $position = 'left') {
        parent::__construct('form-group position-relative has-icon-' . $position);

        $this->input = new input_tag('text', $name, $value, 'form-control');
        $this->input->append_to($this);

        $this->append_div('form-control-icon')->append_i(NULL, $icon);
        $this->link_value_obj($this->input);
    }

    /**
     * Gets the input element for customization
     *
     * @return input_tag The input element
     */
    public function input(): input_tag {
        return $this->input;
    }
}