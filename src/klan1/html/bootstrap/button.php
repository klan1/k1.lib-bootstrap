<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Button component
 *
 * Use Bootstrap's custom button styles for actions in forms, dialogs, and more.
 * Supports multiple sizes, states, variants, and more.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/buttons.mdx
 * @license Apache-2.0
 * @version BETA
 */
class button extends \k1lib\html\button {

    const VARIANT_PRIMARY = 'primary';
    const VARIANT_SECONDARY = 'secondary';
    const VARIANT_SUCCESS = 'success';
    const VARIANT_DANGER = 'danger';
    const VARIANT_WARNING = 'warning';
    const VARIANT_INFO = 'info';
    const VARIANT_LIGHT = 'light';
    const VARIANT_DARK = 'dark';
    const VARIANT_LINK = 'link';

    const SIZE_SM = 'sm';
    const SIZE_MD = 'md';
    const SIZE_LG = 'lg';

    /**
     * @param string|null $value Button text content
     * @param string $variant Bootstrap variant (primary, secondary, etc.)
     * @param string $size Button size (sm, md, lg)
     * @param bool $outline Use outline variant
     * @param string|null $href Use anchor tag instead of button if provided
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
     * Set the Bootstrap variant
     *
     * @param string $variant primary, secondary, success, danger, warning, info, light, dark, link
     * @param bool $outline Use outline variant
     * @return $this
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
     * Set the Bootstrap size
     *
     * @param string $size sm, md, or lg
     * @return $this
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
     * Enable disabled state
     *
     * @param bool $disabled
     * @return $this
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
     * Enable active state for toggle buttons
     *
     * @param bool $active
     * @return $this
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
     * Enable toggle functionality
     *
     * @param bool $toggle
     * @return $this
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
     * Set block level button (full width)
     *
     * @param bool $block
     * @return $this
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
     * Factory method for primary button
     *
     * @param string|null $value
     * @return static
     */
    public static function primary($value = NULL) {
        return new static($value, self::VARIANT_PRIMARY);
    }

    /**
     * Factory method for secondary button
     *
     * @param string|null $value
     * @return static
     */
    public static function secondary($value = NULL) {
        return new static($value, self::VARIANT_SECONDARY);
    }

    /**
     * Factory method for success button
     *
     * @param string|null $value
     * @return static
     */
    public static function success($value = NULL) {
        return new static($value, self::VARIANT_SUCCESS);
    }

    /**
     * Factory method for danger button
     *
     * @param string|null $value
     * @return static
     */
    public static function danger($value = NULL) {
        return new static($value, self::VARIANT_DANGER);
    }

    /**
     * Factory method for warning button
     *
     * @param string|null $value
     * @return static
     */
    public static function warning($value = NULL) {
        return new static($value, self::VARIANT_WARNING);
    }

    /**
     * Factory method for info button
     *
     * @param string|null $value
     * @return static
     */
    public static function info($value = NULL) {
        return new static($value, self::VARIANT_INFO);
    }
}