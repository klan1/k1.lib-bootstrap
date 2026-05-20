<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Button Group component
 *
 * Groups a series of buttons together on a single line or stack them vertically.
 * Buttons should follow the Bootstrap button specification.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/button-group.mdx
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/buttons.mdx
 * @license Apache-2.0
 * @version BETA
 */
class button_group extends \k1lib\html\div {

    /**
     * @param string $size Size (sm, md, lg)
     * @param bool $vertical Stack vertically
     * @param string $label Accessibility label
     */
    public function __construct($size = 'md', $vertical = FALSE, $label = 'Button group') {
        $size_class = $size !== 'md' ? "btn-group-{$size}" : 'btn-group';
        $class = $vertical ? "btn-group-vertical {$size_class}" : $size_class;
        parent::__construct($class, NULL);
        $this->set_attrib('role', 'group');
        $this->set_attrib('aria-label', $label);
    }

    /**
     * Add a button to the group
     *
     * @param \k1lib\html\tag $button Button to add
     * @param int|null $index Position to insert at (null = append)
     * @param bool $insert If true, shift existing buttons to make space
     * @return $this
     */
    public function add_button($button, $index = NULL, $insert = FALSE) {
        if ($index === NULL) {
            $this->append_child($button);
        } elseif ($insert) {
            $childs = $this->get_childs();
            array_splice($childs, $index, 0, [$button]);
            $this->rebuild_childs($childs);
        } else {
            $this->replace_child_at($index, $button);
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

    /**
     * Remove a button by index
     *
     * @param int $index
     * @return $this
     */
    public function remove_button($index) {
        $childs = $this->get_childs();
        if (isset($childs[$index])) {
            array_splice($childs, $index, 1);
            $this->rebuild_childs($childs);
        }
        return $this;
    }

    /**
     * Rebuild childs array from given array
     *
     * @param array $childs
     */
    private function rebuild_childs($childs) {
        $this->remove_childs();
        foreach ($childs as $child) {
            $this->append_child($child);
        }
    }

    /**
     * Replace a button at specific index
     *
     * @param int $index
     * @param \k1lib\html\tag $button
     */
    private function replace_child_at($index, $button) {
        $childs = $this->get_childs();
        if (isset($childs[$index])) {
            $childs[$index] = $button;
            $this->rebuild_childs($childs);
        }
    }
}