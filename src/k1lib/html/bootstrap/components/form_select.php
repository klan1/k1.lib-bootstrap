<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Form Select component
 *
 * Custom select menu built on the native `<select>` element with the
 * Bootstrap `.form-select` class, sizing and validation helpers.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/select.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class form_select extends \k1lib\html\select {
    use bootstrap_assets;

    use bootstrap_methods;

    /**
     * Creates a new Form Select instance
     *
     * @param string $name Select name attribute
     * @param string|null $id Select id attribute
     * @param string|null $size lg or sm
     */
    public function __construct($name = '', $id = NULL, $size = NULL, $multiple = FALSE, $disabled = FALSE) {
        self::require_assets();
        parent::__construct($name, 'form-select', $id);
        if ($size !== NULL) {
            $this->set_size($size);
        }
        if ($multiple) {
            $this->set_multiple(TRUE);
        }
        if ($disabled) {
            $this->set_disabled(TRUE);
        }
    }

    /**
     * Sets the multiple attribute
     *
     * @param bool $multiple Whether the select allows multiple values
     * @return $this For method chaining
     */
    public function set_multiple($multiple = TRUE) {
        if ($multiple) {
            $this->set_attrib('multiple', 'multiple');
        } else {
            $this->remove_attrib('multiple');
        }
        return $this;
    }

    /**
     * Sets the Bootstrap sizing class
     *
     * @param string $size lg or sm (empty clears the sizing class)
     * @return $this For method chaining
     */
    public function set_size($size) {
        $this->remove_attribute_text('class', 'form-select-lg');
        $this->remove_attribute_text('class', 'form-select-sm');
        if ($size === 'lg' || $size === 'sm') {
            $this->set_class('form-select-' . $size, TRUE);
        }
        return $this;
    }

    /**
     * Sets the validation state class
     *
     * @param string $state valid or invalid (empty clears the state class)
     * @return $this For method chaining
     */
    public function set_state($state) {
        $this->remove_attribute_text('class', 'is-valid');
        $this->remove_attribute_text('class', 'is-invalid');
        if ($state === 'valid' || $state === 'invalid') {
            $this->set_class('is-' . $state, TRUE);
        }
        return $this;
    }

    /**
     * Sets the disabled attribute
     *
     * @param bool $disabled Whether the select is disabled
     * @return $this For method chaining
     */
    public function set_disabled($disabled = TRUE) {
        if ($disabled) {
            $this->set_attrib('disabled', 'disabled');
        } else {
            $this->remove_attrib('disabled');
        }
        return $this;
    }

    /**
     * Sets the required attribute
     *
     * @param bool $required Whether the select is required
     * @return $this For method chaining
     */
    public function set_required($required = TRUE) {
        if ($required) {
            $this->set_attrib('required', 'required');
        } else {
            $this->remove_attrib('required');
        }
        return $this;
    }

    /**
     * Adds several options at once
     *
     * @param array $options Value => label map
     * @param string|null $selected Value to mark as selected
     * @return $this For method chaining
     */
    public function set_options(array $options, $selected = NULL) {
        foreach ($options as $value => $label) {
            $this->append_option($value, $label, ($selected !== NULL && $value === $selected));
        }
        return $this;
    }
}
