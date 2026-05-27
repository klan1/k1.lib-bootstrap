<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Button component
 *
 * Creates Bootstrap-styled buttons for actions in forms, dialogs, and more.
 * Supports all Bootstrap button variants (colors), sizes (sm/md/lg),
 * outline styles, disabled state, active/toggle states, and block-level layout.
 * Can render as a <button> or <a> element when href is provided.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/buttons.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class button extends \k1lib\html\button {

    /**
     * Primary button style (solid blue)
     */
    const VARIANT_PRIMARY = 'primary';

    /**
     * Secondary button style (gray)
     */
    const VARIANT_SECONDARY = 'secondary';

    /**
     * Success button style (green)
     */
    const VARIANT_SUCCESS = 'success';

    /**
     * Danger button style (red)
     */
    const VARIANT_DANGER = 'danger';

    /**
     * Warning button style (yellow)
     */
    const VARIANT_WARNING = 'warning';

    /**
     * Info button style (light blue)
     */
    const VARIANT_INFO = 'info';

    /**
     * Light button style (white/light gray)
     */
    const VARIANT_LIGHT = 'light';

    /**
     * Dark button style (dark gray/black)
     */
    const VARIANT_DARK = 'dark';

    /**
     * Link button style (looks like a hyperlink)
     */
    const VARIANT_LINK = 'link';

    /**
     * Small button size
     */
    const SIZE_SM = 'sm';

    /**
     * Medium button size (default)
     */
    const SIZE_MD = 'md';

    /**
     * Large button size
     */
    const SIZE_LG = 'lg';

    /**
     * Creates a new Button instance
     *
     * @param string|null $value Button text content. Empty string for icon-only buttons.
     * @param string $variant Bootstrap variant color (VARIANT_PRIMARY, VARIANT_SECONDARY, etc.)
     * @param string $size Button size (SIZE_SM, SIZE_MD, SIZE_LG)
     * @param bool $outline Use outline variant style instead of solid
     * @param string|null $href If provided, renders as an <a> tag instead of <button>
     */
    public function __construct($value = NULL, $variant = self::VARIANT_PRIMARY, $size = self::SIZE_MD, $outline = FALSE, $href = NULL) {
        if ($href !== NULL) {
            parent::__construct('', 'btn', NULL, 'button');
            $this->set_tag_name('a');
            $this->set_attrib('href', $href);
            $this->set_attrib('role', 'button');
        } else {
            parent::__construct($value, 'btn', NULL, 'button');
        }

        $this->set_variant($variant, $outline);
        $this->set_size($size);
    }

    /**
     * Sets the Bootstrap color variant
     *
     * @param string $variant Bootstrap variant (primary, secondary, success, danger, warning, info, light, dark, link)
     * @param bool $outline Use outline variant style (btn-outline-*) instead of solid (btn-*)
     * @return $this For method chaining
     */
    public function set_variant($variant, $outline = FALSE) {
        $class = 'btn';
        if ($outline) {
            $class .= ' btn-outline-' . $variant;
        } else {
            $class .= ' btn-' . $variant;
        }
        $this->set_class($class, FALSE);
        return $this;
    }

    /**
     * Sets the Bootstrap size variant
     *
     * @param string $size Button size: SIZE_SM, SIZE_MD, or SIZE_LG. MD applies no additional class.
     * @return $this For method chaining
     */
    public function set_size($size) {
        if ($size === self::SIZE_SM) {
            $this->set_class('btn-sm', TRUE);
        } elseif ($size === self::SIZE_LG) {
            $this->set_class('btn-lg', TRUE);
        }
        return $this;
    }

    /**
     * Sets the disabled state
     *
     * For <a> elements: adds .disabled class, aria-disabled="true", and tabindex="-1".
     * For <button> elements: adds the disabled attribute.
     *
     * @param bool $disabled TRUE to disable, FALSE to enable
     * @return $this For method chaining
     */
    public function set_disabled($disabled = TRUE) {
        if ($this->get_tag_name() === 'a') {
            if ($disabled) {
                $this->set_class('disabled', TRUE);
                $this->set_attrib('aria-disabled', 'true');
                $this->set_attrib('tabindex', '-1');
            } else {
                $this->set_class('disabled', FALSE);
                $this->unset_attrib('aria-disabled');
                $this->unset_attrib('tabindex');
            }
        } else {
            if ($disabled) {
                $this->set_attrib('disabled', 'disabled');
            } else {
                $this->unset_attrib('disabled');
            }
        }
        return $this;
    }

    /**
     * Sets the active state for toggle button groups
     *
     * @param bool $active TRUE to mark as active (pressed), FALSE otherwise
     * @return $this For method chaining
     */
    public function set_active($active = TRUE) {
        if ($active) {
            $this->set_class('active', TRUE);
            $this->set_attrib('aria-pressed', 'true');
        } else {
            $this->set_class('active', FALSE);
            $this->unset_attrib('aria-pressed');
        }
        return $this;
    }

    /**
     * Enables Bootstrap toggle button functionality
     *
     * @param bool $toggle TRUE to enable toggle behavior (data-bs-toggle="button"), FALSE to remove
     * @return $this For method chaining
     */
    public function set_toggle($toggle = TRUE) {
        if ($toggle) {
            $this->set_attrib('data-bs-toggle', 'button');
        } else {
            $this->unset_attrib('data-bs-toggle');
        }
        return $this;
    }

    /**
     * Sets block-level button (full width)
     *
     * @param bool $block TRUE for full-width button, FALSE for default width
     * @return $this For method chaining
     */
    public function set_block($block = TRUE) {
        if ($block) {
            $this->set_class('d-grid gap-2', TRUE);
        } else {
            $this->set_class('d-grid gap-2', FALSE);
        }
        return $this;
    }

    /**
     * Factory method to create a primary button
     *
     * @param string|null $value Button text content
     * @return static New button instance with primary variant
     */
    public static function primary($value = NULL) {
        return new static($value, self::VARIANT_PRIMARY);
    }

    /**
     * Factory method to create a secondary button
     *
     * @param string|null $value Button text content
     * @return static New button instance with secondary variant
     */
    public static function secondary($value = NULL) {
        return new static($value, self::VARIANT_SECONDARY);
    }

    /**
     * Factory method to create a success button
     *
     * @param string|null $value Button text content
     * @return static New button instance with success variant
     */
    public static function success($value = NULL) {
        return new static($value, self::VARIANT_SUCCESS);
    }

    /**
     * Factory method to create a danger button
     *
     * @param string|null $value Button text content
     * @return static New button instance with danger variant
     */
    public static function danger($value = NULL) {
        return new static($value, self::VARIANT_DANGER);
    }

    /**
     * Factory method to create a warning button
     *
     * @param string|null $value Button text content
     * @return static New button instance with warning variant
     */
    public static function warning($value = NULL) {
        return new static($value, self::VARIANT_WARNING);
    }

    /**
     * Factory method to create an info button
     *
     * @param string|null $value Button text content
     * @return static New button instance with info variant
     */
    public static function info($value = NULL) {
        return new static($value, self::VARIANT_INFO);
    }
}