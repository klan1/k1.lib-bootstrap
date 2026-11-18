<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Range component
 *
 * Custom range input with the Bootstrap `.form-range` class.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/range.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class range extends \k1lib\html\input {
    use bootstrap_assets;

    /**
     * Creates a new Range instance
     *
     * @param string $name Input name attribute
     * @param string|null $id Input id attribute
     * @param int $min Minimum value
     * @param int $max Maximum value
     * @param int|float $step Step increment
     * @param int|float|null $value Initial value
     */
    public function __construct($name = '', $id = NULL, $min = 0, $max = 100, $step = 1, $value = NULL) {
        self::require_assets();
        parent::__construct('range', $name, $value, 'form-range', $id);
        $this->set_attrib('min', $min);
        $this->set_attrib('max', $max);
        $this->set_attrib('step', $step);
    }

    /**
     * Sets the disabled attribute
     *
     * @param bool $disabled Whether the range is disabled
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
}
