<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Form Control component
 *
 * Textual form control for text-like inputs: text, email, password, url,
 * number, date, etc. Applies the Bootstrap `.form-control` class and its
 * sizing and validation state helpers.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/form-control.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class form_control extends \k1lib\html\input {
    use bootstrap_assets;

    use bootstrap_methods;

    /**
     * Creates a new Form Control instance
     *
     * @param string $type Input type (text, email, password, url, number, date...)
     * @param string $name Input name attribute
     * @param string $value Input value attribute
     * @param string|null $id Input id attribute
     * @param string|null $placeholder Input placeholder attribute
     */
    public function __construct($type = 'text', $name = '', $value = '', $id = NULL, $placeholder = NULL) {
        self::require_assets();
        parent::__construct($type, $name, $value, 'form-control', $id);
        if ($placeholder !== NULL) {
            $this->set_attrib('placeholder', $placeholder);
        }
    }

    /**
     * Sets the Bootstrap sizing class
     *
     * @param string $size lg or sm (empty clears the sizing class)
     * @return $this For method chaining
     */
    public function set_size($size) {
        $this->remove_attribute_text('class', 'form-control-lg');
        $this->remove_attribute_text('class', 'form-control-sm');
        if ($size === 'lg' || $size === 'sm') {
            $this->set_class('form-control-' . $size, TRUE);
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
     * Switches to the plain text variant
     *
     * @param bool $plain Whether to use .form-control-plaintext
     * @return $this For method chaining
     */
    public function set_plain_text($plain = TRUE) {
        if ($plain) {
            $this->remove_attribute_text('class', 'form-control');
            $this->set_class('form-control-plaintext', TRUE);
        } else {
            $this->remove_attribute_text('class', 'form-control-plaintext');
            $this->set_class('form-control', TRUE);
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
            $this->set_attrib('disabled', 'disabled');
        } else {
            $this->remove_attrib('disabled');
        }
        return $this;
    }

    /**
     * Sets the readonly attribute
     *
     * @param bool $readonly Whether the control is readonly
     * @return $this For method chaining
     */
    public function set_readonly($readonly = TRUE) {
        if ($readonly) {
            $this->set_attrib('readonly', 'readonly');
        } else {
            $this->remove_attrib('readonly');
        }
        return $this;
    }

    /**
     * Sets the required attribute
     *
     * @param bool $required Whether the control is required
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
}
