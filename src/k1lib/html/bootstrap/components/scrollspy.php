<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Scrollspy component
 *
 * Scrollable container with `data-bs-spy="scroll"` that highlights the
 * navigation links while scrolling through the target sections.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/scrollspy.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class scrollspy extends \k1lib\html\div {
    use bootstrap_assets;

    /**
     * Creates a new Scrollspy instance
     *
     * @param string $target CSS selector of the navigation to highlight
     * @param string $height Max height of the scrollable container (CSS value)
     */
    public function __construct($target = '', $height = '300px') {
        self::require_assets();
        parent::__construct('position-relative', NULL);
        $this->set_attrib('data-bs-spy', 'scroll');
        $this->set_attrib('data-bs-target', $target);
        $this->set_attrib('tabindex', '0');
        $this->set_attrib('data-bs-smooth-scroll', 'true');
        $this->set_height($height);
    }

    /**
     * Sets the scrollable container height
     *
     * @param string $height CSS value (for example 300px)
     * @return $this For method chaining
     */
    public function set_height($height) {
        $this->set_attrib('style', 'overflow-y: auto; max-height: ' . $height . ';');
        return $this;
    }

    /**
     * Sets the navigation target selector
     *
     * @param string $target CSS selector of the navigation
     * @return $this For method chaining
     */
    public function set_target($target) {
        $this->set_attrib('data-bs-target', $target);
        return $this;
    }

    /**
     * Sets the root margin used by the scroll spy
     *
     * @param string $root_margin CSS margin value
     * @return $this For method chaining
     */
    public function set_root_margin($root_margin) {
        $this->set_attrib('data-bs-root-margin', $root_margin);
        return $this;
    }

    /**
     * Sets the scroll offset
     *
     * @param int $offset Offset in pixels
     * @return $this For method chaining
     */
    public function set_offset($offset) {
        $this->set_attrib('data-bs-offset', $offset);
        return $this;
    }
}
