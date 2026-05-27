<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Top Bar component
 *
 * A top navigation bar with an embedded dropdown menu on the left side
 * and a title area. Used for application headers or page-level
 * navigation with dropdown menu support.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version 1.0.0
 */
class top_bar extends bar {

    /**
     * Left side dropdown menu
     * @var menu
     */
    protected $menu_left = null;

    /**
     * Title span element
     * @var \k1lib\html\span
     */
    protected $title = null;

    /**
     * Creates a new Top Bar instance
     *
     * @param string|null $id Optional element ID
     */
    function __construct($id = NULL) {
        parent::__construct('top', $id);

        $this->menu_left = new menu('dropdown');
        $this->menu_left->append_to($this->left);
        $this->title = $this->menu_left->add_menu_item(NULL, NULL);
        $this->title->set_class('menu-text');
    }

    /**
     * Gets the title span element
     *
     * @return \k1lib\html\span The title element
     */
    public function title() {
        return $this->title;
    }

    /**
     * Gets the left dropdown menu
     *
     * @return menu The menu component
     */
    public function menu_left() {
        return $this->menu_left;
    }
}