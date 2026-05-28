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

    /**
     * @param string $size Size (sm, lg) - leave empty for default
     * @param bool $vertical Stack vertically
     * @param string $label Accessibility label
     */
    public function __construct($size = '', $vertical = FALSE, $label = 'Button group') {
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
    public function add_button($button) {
        $this->append_child($button);
        return $this;
    }

    /**
     * Add multiple buttons at once
     *
     * @param array $buttons Array of button objects
     * @return $this
     */
    public function add_buttons(array $buttons) {
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
    public function button($index) {
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

/**
 * Bootstrap 5 Button Toolbar component
 *
 * Combines groups of button groups into button toolbars.
 */
class button_toolbar extends \k1lib\html\div {

    /**
     * @param string $label Accessibility label
     */
    public function __construct($label = 'Button toolbar') {
        parent::__construct('btn-toolbar', NULL);
        $this->set_attrib('role', 'toolbar');
        $this->set_attrib('aria-label', $label);
    }

    /**
     * Add a button group to the toolbar
     *
     * @param \k1lib\html\bootstrap\components\button_group $group
     * @param string $class Additional classes like 'me-2' for spacing
     * @return $this
     */
    public function add_group(button_group $group, $class = '') {
        $group_div = new \k1lib\html\div('btn-group ' . $class);
        foreach ($group->get_childs() as $child) {
            $group_div->append_child($child);
        }
        $this->append_child($group_div);
        return $this;
    }
}