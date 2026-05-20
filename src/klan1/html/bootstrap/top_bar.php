<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Top Bar component
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/navbar.mdx
 * @license Apache-2.0
 */

class top_bar extends bar {

    /**
     * @var menu
     */
    protected $menu_left = null;

    /**
     * @var \k1lib\html\span
     */
    protected $title = null;

    function __construct($id = NULL) {
        parent::__construct('top', $id);

        $this->menu_left = new menu('dropdown');
        $this->menu_left->append_to($this->left);
        $this->title = $this->menu_left->add_menu_item(NULL, NULL);
        $this->title->set_class('menu-text');
    }

    /**
     * @return \k1lib\html\span
     */
    public function title() {
        return $this->title;
    }

    /**
     * @return menu
     */
    public function menu_left() {
        return $this->menu_left;
    }
}
