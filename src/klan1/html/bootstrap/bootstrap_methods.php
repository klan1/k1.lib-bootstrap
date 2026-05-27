<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap Grid Methods Trait
 *
 * Provides responsive grid column utilities for Bootstrap 5 grid system.
 * This trait adds methods to set column spans at different breakpoints
 * (general, small, medium, large, extra-large, extra-extra-large).
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version 1.0.0
 */

use k1lib\html\button;
use k1lib\html\div;

trait bootstrap_methods {

    /**
     * General/smallest breakpoint column span
     * @var int|null
     */
    protected $general = NULL;

    /**
     * Small breakpoint (sm) column span
     * @var int|null
     */
    protected $small = NULL;

    /**
     * Medium breakpoint (md) column span
     * @var int|null
     */
    protected $medium = NULL;

    /**
     * Large breakpoint (lg) column span
     * @var int|null
     */
    protected $large = NULL;

    /**
     * Extra large breakpoint (xl) column span
     * @var int|null
     */
    protected $xlarge = NULL;

    /**
     * Extra extra large breakpoint (xxl) column span
     * @var int|null
     */
    protected $xxlarge = NULL;

    /**
     * Finds a text pattern like "sm-12" in an attribute value and replaces the number
     *
     * @param string $attribute Attribute name to modify
     * @param string $text Text prefix to search for (e.g., 'sm', 'col')
     * @param int $new_number New number to replace with
     * @return string The new attribute value
     */
    public function replace_attribute_number($attribute, $text, $new_number) {
        $attribute_value = $this->get_attribute($attribute);
        $text_regexp = "/({$text}-[0-9]+)/";
        $regexp_match = [];
        if (preg_match($text_regexp, $attribute_value, $regexp_match)) {
            $string_new = str_replace($regexp_match[1], "{$text}-{$new_number}", $attribute_value);
            $this->set_attrib($attribute, $string_new);
            return $string_new;
        } else {
            $this->set_attrib($attribute, $attribute_value . " {$text}-{$new_number}");
            return $attribute_value . " {$text}-{$new_number}";
        }
    }

    /**
     * Removes a text pattern from an attribute value
     *
     * @param string $attribute Attribute name to modify
     * @param string $text Text to remove
     * @return string The modified attribute value
     */
    public function remove_attribute_text($attribute, $text) {
        $attribute_value = $this->get_attribute($attribute);
        $text_regexp = "/(\s*$text\s*)/";
        $regexp_match = [];
        if (preg_match($text_regexp, $attribute_value, $regexp_match)) {
            $string_new = str_replace($regexp_match[1], "", $attribute_value);
            $this->set_attrib($attribute, $string_new);
            return $string_new;
        } else {
            return $attribute_value;
        }
    }

    /**
     * Appends a Bootstrap close button to the element
     *
     * @return \k1lib\html\button The created close button
     */
    public function append_close_button() {
        $close_button = new button(NULL, "btn-close");
        $close_button->set_attrib('data-bs-dismiss', 'alert');
        $close_button->set_attrib("aria-label", "Close");
        $this->append_child_tail($close_button);
    }

    /**
     * Sets center text alignment
     *
     * @return $this For method chaining
     */
    public function align_center() {
        $this->set_attrib("class", "align-center", TRUE);
        return $this;
    }

    /**
     * Sets left text alignment
     *
     * @return $this For method chaining
     */
    public function align_left() {
        $this->set_attrib("class", "align-left", TRUE);
        return $this;
    }

    /**
     * Sets right text alignment
     *
     * @return $this For method chaining
     */
    public function align_right() {
        $this->set_attrib("class", "align-right", TRUE);
        return $this;
    }

    /**
     * Sets justified text alignment
     *
     * @return $this For method chaining
     */
    public function align_justify() {
        $this->set_attrib("class", "align-justify", TRUE);
        return $this;
    }

    /**
     * Sets column span for all breakpoints (col-*)
     *
     * @param int $cols Number of columns (1-12)
     * @param bool $clear Replace existing classes instead of appending
     * @return $this For method chaining
     */
    public function general($cols, $clear = FALSE) {
        $this->general = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "col", $cols);
        }

        return $this;
    }

    /**
     * Sets column span for small breakpoint (col-sm-*)
     *
     * @param int $cols Number of columns (1-12)
     * @param bool $clear Replace existing classes instead of appending
     * @return $this For method chaining
     */
    public function small($cols, $clear = FALSE) {
        $this->small = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-sm-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "col-sm", $cols);
        }

        return $this;
    }

    /**
     * Sets column span for medium breakpoint (col-md-*)
     *
     * @param int $cols Number of columns (1-12)
     * @param bool $clear Replace existing classes instead of appending
     * @return $this For method chaining
     */
    public function medium($cols, $clear = FALSE) {
        $this->medium = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-md-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "col-md", $cols);
        }

        return $this;
    }

    /**
     * Sets column span for large breakpoint (col-lg-*)
     *
     * @param int $cols Number of columns (1-12)
     * @param bool $clear Replace existing classes instead of appending
     * @return $this For method chaining
     */
    public function large($cols, $clear = FALSE) {
        $this->large = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-lg-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "col-lg", $cols);
        }

        return $this;
    }

    /**
     * Sets column span for extra large breakpoint (col-xl-*)
     *
     * @param int $cols Number of columns (1-12)
     * @param bool $clear Replace existing classes instead of appending
     * @return $this For method chaining
     */
    public function xlarge($cols, $clear = FALSE) {
        $this->xlarge = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-xl-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "col-xl", $cols);
        }

        return $this;
    }

    /**
     * Sets column span for extra extra large breakpoint (col-xxl-*)
     *
     * @param int $cols Number of columns (1-12)
     * @param bool $clear Replace existing classes instead of appending
     * @return $this For method chaining
     */
    public function xxlarge($cols, $clear = FALSE) {
        $this->xxlarge = $cols;

        if ($clear) {
            $this->set_attrib("class", "col-xxl-{$cols}", (!$clear));
        } else {
            $this->replace_attribute_number("class", "col-xxl", $cols);
        }

        return $this;
    }

    /**
     * Gets the small breakpoint column value
     *
     * @return int|null The column span or null
     */
    public function get_small() {
        return $this->small;
    }

    /**
     * Gets the medium breakpoint column value
     *
     * @return int|null The column span or null
     */
    public function get_medium() {
        return $this->medium;
    }

    /**
     * Gets the large breakpoint column value
     *
     * @return int|null The column span or null
     */
    public function get_large() {
        return $this->large;
    }
}