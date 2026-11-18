<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Popover component
 *
 * A button that toggles a popover with a title and content, using the
 * Bootstrap data attributes and the bundle JavaScript.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/popovers.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class popover extends button {
    use bootstrap_assets;

    /**
     * Creates a new Popover instance
     *
     * @param string|null $value Button text
     * @param string $variant Button variant
     * @param string $title Popover title
     * @param string $content Popover body content
     * @param string $placement top, bottom, left or right
     * @param string $trigger click, hover or focus
     */
    public function __construct($value = NULL, $variant = button::VARIANT_SECONDARY, $title = '', $content = '', $placement = 'right', $trigger = 'focus') {
        self::require_assets();
        parent::__construct($value, $variant);
        $this->set_attrib('data-bs-toggle', 'popover');
        $this->set_attrib('title', $title);
        $this->set_attrib('data-bs-content', $content);
        $this->set_attrib('data-bs-placement', $placement);
        $this->set_attrib('data-bs-trigger', $trigger);
        $this->set_attrib('data-bs-container', 'body');
    }

    /**
     * Sets the popover title
     *
     * @param string $title Popover title
     * @return $this For method chaining
     */
    public function set_title($title) {
        $this->set_attrib('title', $title);
        return $this;
    }

    /**
     * Sets the popover body content
     *
     * @param string $content Popover body content
     * @return $this For method chaining
     */
    public function set_content($content) {
        $this->set_attrib('data-bs-content', $content);
        return $this;
    }

    /**
     * Sets the popover placement
     *
     * @param string $placement top, bottom, left or right
     * @return $this For method chaining
     */
    public function set_placement($placement) {
        $this->set_attrib('data-bs-placement', $placement);
        return $this;
    }

    /**
     * Sets the popover trigger
     *
     * @param string $trigger click, hover or focus
     * @return $this For method chaining
     */
    public function set_trigger($trigger) {
        $this->set_attrib('data-bs-trigger', $trigger);
        return $this;
    }

    /**
     * Allows HTML inside the popover
     *
     * @param bool $html Whether HTML is allowed
     * @return $this For method chaining
     */
    public function set_html($html = TRUE) {
        $this->set_attrib('data-bs-html', $html ? 'true' : 'false');
        return $this;
    }
}
