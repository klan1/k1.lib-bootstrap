<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Dropdown component
 *
 * Interactive button menu that reveals a list of actions or links.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
* @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/dropdown.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class dropdown extends \k1lib\html\div {

    protected $menu = NULL;
    protected $toggle = NULL;

    /**
     * @param string $label Button text
     * @param array $items Array of ['text' => '', 'href' => '', 'divider' => bool]
     * @param string $direction Drop direction (down, up, start, end)
     */
    public function __construct($label = 'Dropdown', $items = [], $direction = 'down') {
        parent::__construct('dropdown', NULL);

        $this->toggle = new \k1lib\html\button($label);
        $this->toggle->set_class('btn btn-secondary dropdown-toggle');
        $this->toggle->set_attrib('type', 'button');
        $this->toggle->set_attrib('data-bs-toggle', 'dropdown');
        $this->toggle->set_attrib('aria-expanded', 'false');
        $this->toggle->set_attrib('id', 'mainDropdown');

        $this->menu = new \k1lib\html\ul('dropdown-menu');
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