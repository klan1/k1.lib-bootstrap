<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Floating Label component
 *
 * Wraps a textual form control (input, textarea or select) and its label
 * inside a `.form-floating` container so the label floats over the control.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/floating-labels.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class floating_label extends \k1lib\html\div {
    use bootstrap_assets;

    /**
     * The wrapped form control
     * @var \k1lib\html\tag
     */
    protected $control = NULL;

    /**
     * Creates a new Floating Label instance
     *
     * @param string $label Label text
     * @param \k1lib\html\tag|null $control Form control (input, textarea or select). Created when NULL.
     * @param string|null $id Control id (generated when NULL)
     */
    public function __construct($label = '', $control = NULL, $id = NULL) {
        self::require_assets();
        parent::__construct('form-floating', NULL);

        if ($control === NULL) {
            $control = new form_control('text', '', '', $id);
        }
        $control_id = $control->get_attribute('id');
        if (empty($control_id)) {
            $control_id = 'floating-' . uniqid();
            $control->set_id($control_id);
        }
        if (empty($control->get_attribute('placeholder'))) {
            $control->set_attrib('placeholder', $label);
        }

        $this->control = $control;
        $this->append_child($control);
        $this->append_child(new \k1lib\html\label($label, $control_id));
    }

    /**
     * Gets the wrapped form control
     *
     * @return \k1lib\html\tag
     */
    public function control(): \k1lib\html\tag {
        return $this->control;
    }
}
