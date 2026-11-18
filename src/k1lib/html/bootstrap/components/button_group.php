<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Button Group component
 *
 * Groups a series of buttons together on a single line or stack them vertically.
 * Buttons should follow the Bootstrap button specification.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/button-group.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class button_group extends \k1lib\html\div {
    use bootstrap_assets;

    /**
     * @param string $size Size (sm, lg) - leave empty for default
     * @param bool $vertical Stack vertically
     * @param string $label Accessibility label
     */
    public function __construct($size = '', $vertical = FALSE, $label = 'Button group') {
        self::require_assets();
        if ($vertical) {
            $class = 'btn-group-vertical';
        } else {
            $class = 'btn-group';
            if ($size === 'sm') {
                $class .= ' btn-group-sm';
            } elseif ($size === 'lg') {
                $class .= ' btn-group-lg';
            }
        }

        parent::__construct($class, NULL);
        $this->set_attrib('role', 'group');
        $this->set_attrib('aria-label', $label);
    }

    /**
     * Add a button to the group
     *
     * @param \k1lib\html\tag $button Button to add
     * @return $this
     */
    public function add_button($button): static {
        $this->append_child($button);
        return $this;
    }

    /**
     * Add multiple buttons at once
     *
     * @param array $buttons Array of button objects
     * @return $this
     */
    public function add_buttons(array $buttons): static {
        foreach ($buttons as $button) {
            $this->append_child($button);
        }
        return $this;
    }

    /**
     * Get a button by index
     *
     * @param int $index
     * @return \k1lib\html\tag|null
     */
    public function button($index): \k1lib\html\tag|null {
        $childs = $this->get_childs();
        return $childs[$index] ?? NULL;
    }

    /**
     * Get total number of buttons
     *
     * @return int
     */
    public function count() {
        return count($this->get_childs());
    }
}
