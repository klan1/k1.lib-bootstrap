<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Input Group component
 *
 * Extends form controls with text, buttons or button groups on either side.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/input-group.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class input_group extends \k1lib\html\div {
    use bootstrap_assets;

    use bootstrap_methods;

    /**
     * Creates a new Input Group instance
     *
     * @param string|null $size lg or sm
     */
    public function __construct($size = NULL) {
        self::require_assets();
        parent::__construct('input-group', NULL);
        if ($size !== NULL) {
            $this->set_size($size);
        }
    }

    /**
     * Sets the Bootstrap sizing class
     *
     * @param string $size lg or sm (empty clears the sizing class)
     * @return $this For method chaining
     */
    public function set_size($size) {
        $this->remove_attribute_text('class', 'input-group-lg');
        $this->remove_attribute_text('class', 'input-group-sm');
        if ($size === 'lg' || $size === 'sm') {
            $this->set_class('input-group-' . $size, TRUE);
        }
        return $this;
    }

    /**
     * Adds a text addon
     *
     * @param string $text Addon text
     * @param string $position before or after
     * @param string|null $id Addon id (useful for aria-describedby)
     * @return \k1lib\html\span The created addon
     */
    public function add_addon($text, $position = 'before', $id = NULL) {
        $addon = new \k1lib\html\span('input-group-text', $id);
        $addon->set_value($text);
        if ($position === 'before') {
            $this->append_child_head($addon);
        } else {
            $this->append_child($addon);
        }
        return $addon;
    }

    /**
     * Adds a form control
     *
     * @param \k1lib\html\tag $control Form control
     * @param string $position before or after
     * @return \k1lib\html\tag The added control
     */
    public function add_control($control, $position = 'after') {
        if ($position === 'before') {
            $this->append_child_head($control);
        } else {
            $this->append_child($control);
        }
        return $control;
    }

    /**
     * Adds a button
     *
     * @param \k1lib\html\tag $button Button element
     * @param string $position before or after
     * @return \k1lib\html\tag The added button
     */
    public function add_button($button, $position = 'after') {
        if ($position === 'before') {
            $this->append_child_head($button);
        } else {
            $this->append_child($button);
        }
        return $button;
    }
}
