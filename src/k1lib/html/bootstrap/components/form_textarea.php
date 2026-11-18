<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Form Textarea component
 *
 * Textarea with the Bootstrap `.form-control` class, sizing and validation
 * state helpers.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/form-control.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class form_textarea extends \k1lib\html\textarea {
    use bootstrap_assets;

    use bootstrap_methods;

    /**
     * Creates a new Form Textarea instance
     *
     * @param string $name Textarea name attribute
     * @param string|null $id Textarea id attribute
     * @param int|null $rows Number of visible rows (default: Bootstrap/K1 default)
     * @param string|null $placeholder Textarea placeholder attribute
     */
    public function __construct($name = '', $id = NULL, $rows = NULL, $placeholder = NULL) {
        self::require_assets();
        parent::__construct($name, 'form-control', $id);
        if ($rows !== NULL) {
            $this->set_attrib('rows', $rows);
        }
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
     * Sets the disabled attribute
     *
     * @param bool $disabled Whether the textarea is disabled
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
     * @param bool $readonly Whether the textarea is readonly
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
}
