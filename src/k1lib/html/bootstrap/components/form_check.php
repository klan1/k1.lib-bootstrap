<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Form Check component
 *
 * Checkbox, radio and switch controls using the Bootstrap `.form-check`
 * structure: a `.form-check-input` and a sibling `.form-check-label`.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/checks-radios.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class form_check extends \k1lib\html\div {
    use bootstrap_assets;

    use bootstrap_methods;

    /**
     * The check input element
     * @var \k1lib\html\input
     */
    protected $input = NULL;

    /**
     * The check label element
     * @var \k1lib\html\label|null
     */
    protected $label = NULL;

    /**
     * Creates a new Form Check instance
     *
     * @param string $label Label text
     * @param string $name Input name attribute
     * @param string $value Input value attribute
     * @param string $type checkbox or radio
     * @param string|null $id Input id (also used for the label `for`)
     * @param bool $checked Whether the input is checked
     */
    public function __construct($label = '', $name = '', $value = '', $type = 'checkbox', $id = NULL, $checked = FALSE) {
        self::require_assets();
        if ($id === NULL) {
            $id = 'check-' . uniqid();
        }
        parent::__construct('form-check', NULL);

        $this->input = new \k1lib\html\input($type, $name, $value, 'form-check-input', $id);
        if ($checked) {
            $this->input->set_attrib('checked', 'checked');
        }
        $this->append_child($this->input);

        if ($label !== '') {
            $this->label = new \k1lib\html\label($label, $id, 'form-check-label');
            $this->append_child($this->label);
        }
    }

    /**
     * Gets the check input element
     *
     * @return \k1lib\html\input
     */
    public function input(): \k1lib\html\input {
        return $this->input;
    }

    /**
     * Gets the check label element
     *
     * @return \k1lib\html\label|null
     */
    public function label() {
        return $this->label;
    }

    /**
     * Turns the control into a Bootstrap switch
     *
     * @param bool $switch Whether to use the switch style
     * @return $this For method chaining
     */
    public function set_switch($switch = TRUE) {
        if ($switch) {
            $this->set_class('form-switch', TRUE);
            $this->input->set_attrib('role', 'switch');
        } else {
            $this->remove_attribute_text('class', 'form-switch');
            $this->input->remove_attrib('role');
        }
        return $this;
    }

    /**
     * Makes the check inline
     *
     * @param bool $inline Whether to use the inline style
     * @return $this For method chaining
     */
    public function set_inline($inline = TRUE) {
        if ($inline) {
            $this->set_class('form-check-inline', TRUE);
        } else {
            $this->remove_attribute_text('class', 'form-check-inline');
        }
        return $this;
    }

    /**
     * Makes the check reverse (label before input)
     *
     * @param bool $reverse Whether to use the reverse style
     * @return $this For method chaining
     */
    public function set_reverse($reverse = TRUE) {
        if ($reverse) {
            $this->set_class('form-check-reverse', TRUE);
        } else {
            $this->remove_attribute_text('class', 'form-check-reverse');
        }
        return $this;
    }

    /**
     * Sets the disabled attribute
     *
     * @param bool $disabled Whether the control is disabled
     * @return $this For method chaining
     */
    public function set_disabled($disabled = TRUE) {
        if ($disabled) {
            $this->input->set_attrib('disabled', 'disabled');
        } else {
            $this->input->remove_attrib('disabled');
        }
        return $this;
    }

    /**
     * Marks the checkbox as indeterminate
     *
     * @param bool $indeterminate Whether the checkbox is indeterminate
     * @return $this For method chaining
     */
    public function set_indeterminate($indeterminate = TRUE) {
        if ($indeterminate) {
            $input_id = $this->input->get_attribute('id');
            if (empty($input_id)) {
                $input_id = 'check-' . uniqid();
                $this->input->set_id($input_id);
            }
            $script = new \k1lib\html\script();
            $script->set_value("document.getElementById('{$input_id}').indeterminate = true;");
            $this->append_child_tail($script);
        }
        return $this;
    }
}
