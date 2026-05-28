<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Dropdown component
 *
 * An interactive dropdown menu that reveals a list of actions or links
 * when the trigger button is clicked. Supports directional variants
 * (dropup, dropend, dropstart) and dividers between menu items.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/dropdown.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class dropdown extends \k1lib\html\div {

    /**
     * The dropdown menu ul element
     * @var \k1lib\html\ul
     */
    protected $menu = NULL;

    /**
     * The dropdown toggle button
     * @var \k1lib\html\button
     */
    protected $toggle = NULL;

    /**
     * Creates a new Dropdown instance
     *
     * @param string $label The button text that triggers the dropdown
     * @param array $items Array of menu item configurations:
     *   - 'text' (string): Item display text
     *   - 'href' (string): URL the item links to
     *   - 'divider' (bool): TRUE to render a divider line instead of an item
     * @param string $direction Drop direction: 'down', 'up', 'start', or 'end'
     */
    public function __construct($label = 'Dropdown', $items = [], $direction = 'down') {
        parent::__construct('dropdown', NULL);

        $this->toggle = new \k1lib\html\button($label);
        $this->toggle->set_class('btn btn-secondary dropdown-toggle');
        $this->toggle->set_attrib('type', 'button');
        $this->toggle->set_attrib('data-bs-toggle', 'dropdown');
        $this->toggle->set_attrib('aria-expanded', 'false');
        $this->toggle->set_attrib('id', 'mainDropdown');

        $direction_class = 'dropdown-menu';
        if ($direction === 'up') {
            $direction_class = 'dropup';
        } elseif ($direction === 'start') {
            $direction_class = 'dropstart';
        } elseif ($direction === 'end') {
            $direction_class = 'dropend';
        }

        $this->menu = new \k1lib\html\ul($direction_class);
        $this->menu->set_attrib('aria-labelledby', 'mainDropdown');

        foreach ($items as $item) {
            if (!empty($item['divider'])) {
                $this->menu->append_li()->set_class('dropdown-divider');
            } else {
                $li = $this->menu->append_li();
                $li->append_a($item['href'] ?? '#', $item['text'] ?? '');
                $li->set_class('dropdown-item');
            }
        }

        $this->append_child($this->toggle);
        $this->append_child($this->menu);
    }
}