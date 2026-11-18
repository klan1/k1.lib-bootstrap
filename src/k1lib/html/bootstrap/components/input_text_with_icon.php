<?php

namespace k1lib\html\bootstrap\components;

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
    use bootstrap_assets;

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
        self::require_assets();
        parent::__construct('form-group position-relative has-icon-' . $position);

        $this->input = new input_tag('text', $name, $value, 'form-control');
        // [Klan1-Developer IA] Reserve space so the overlaid icon does not hide the text
        if ($position === 'right') {
            $this->input->set_attrib('style', 'padding-right: 2.25rem;');
        } else {
            $this->input->set_attrib('style', 'padding-left: 2.25rem;');
        }
        $this->input->append_to($this);

        // [Klan1-Developer IA] Overlay the icon inside the input
        $icon_span = $this->append_span('form-control-icon');
        $icon_style = 'position:absolute; top:50%; transform:translateY(-50%); pointer-events:none; ';
        $icon_style .= ($position === 'right') ? 'right:.75rem;' : 'left:.75rem;';
        $icon_span->set_attrib('style', $icon_style);
        if (!empty($icon)) {
            $icon_span->append_i(NULL, $icon);
        }
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
