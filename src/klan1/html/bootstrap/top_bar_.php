<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Top Bar alternate component
 *
 * An alternative top bar implementation with dropdown menus on both
 * left and right sides. Includes title management with multiple span
 * elements for hierarchical titles and responsive toggle support.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version 1.0.0
 */
class top_bar_ extends \k1lib\html\tag {

    use bootstrap_methods;
    use \k1lib\html\append_shortcuts;

    /**
     * Parent element to append to
     * @var \k1lib\html\tag
     */
    protected $parent;

    /**
     * Left dropdown menu
     * @var \k1lib\html\ul
     */
    protected $menu_left;

    /**
     * Right dropdown menu
     * @var \k1lib\html\ul
     */
    protected $menu_right;

    /**
     * Creates a new Top Bar alternate instance
     *
     * @param \k1lib\html\tag $parent Element to append the top bar to
     */
    function __construct(\k1lib\html\tag $parent) {
        $this->parent = $parent;
        $this->init_title_bar();

        parent::__construct("div", IS_NOT_SELF_CLOSED);
        $this->set_class("top-bar hide-for-print", TRUE);
        $this->set_id("responsive-menu");
        $this->append_to($parent);

        $left = $this->append_div("top-bar-left");

        $this->menu_left = new \k1lib\html\ul("dropdown menu", "k1lib-menu-left");
        $this->menu_left->append_to($left);
        $this->menu_left->set_attrib("data-dropdown-menu", TRUE);

        $li = $this->menu_left->append_li(NULL, "menu-text k1lib-title-container hide-for-small-only");
        $li->append_span("k1lib-title-1");
        $li->append_span("k1lib-title-2");
        $li->append_span("k1lib-title-3");

        $right = $this->append_div("top-bar-right");

        $this->menu_right = new \k1lib\html\ul("dropdown menu", "k1lib-menu-right");
        $this->menu_right->append_to($right);
        $this->menu_right->set_attrib("data-dropdown-menu", TRUE);
    }

    /**
     * Adds a button to the right menu
     *
     * @param string $href Button link URL
     * @param string $label Button text
     * @param string|null $class Additional CSS classes
     * @param string|null $id Optional element ID
     * @return \k1lib\html\a The created anchor element
     */
    function add_button($href, $label, $class = NULL, $id = NULL) {
        $a = new \k1lib\html\a($href, $label, "_self", "button $class", $id);
        $this->menu_right->append_li()->append_child($a);
        return $a;
    }

    /**
     * Adds a menu item to the left menu
     *
     * @param string $href Item link URL
     * @param string $label Item text
     * @param \k1lib\html\tag|null $where Optional parent element to add under
     * @return \k1lib\html\li The created list item
     */
    function add_menu_item($href, $label, \k1lib\html\tag $where = NULL) {
        if (empty($where)) {
            $li = $this->menu_left->append_li();
            $li->append_a($href, $label);
        } else {
            $li = $where->append_li();
            $li->append_a($href, $label);
        }
        return $li;
    }

    /**
     * Adds a submenu under a parent list item
     *
     * @param \k1lib\html\li $where Parent list item
     * @return \k1lib\html\ul The created submenu
     */
    function add_sub_menu(\k1lib\html\li $where) {
        $sub_ul = $where->append_ul("menu vertical");
        return $sub_ul;
    }

    /**
     * Sets a title value on title spans
     *
     * @param int $number Title number (1, 2, or 3)
     * @param string $value Title text value
     * @param bool $append Append to existing value instead of replacing
     */
    function set_title($number, $value, $append = FALSE) {
        $elements = $this->parent->get_elements_by_class("k1lib-title-{$number}");
        foreach ($elements as $element) {
            $element->set_value($value, $append);
        }
    }

    /**
     * Initializes the responsive title bar
     */
    function init_title_bar() {
        $title = $this->parent->append_div("title-bar")
                ->set_attrib("data-responsive-toggle", "responsive-menu")
                ->set_attrib("data-hide-for", "medium");
        $title->append_child((new \k1lib\html\button(NULL, "menu-icon"))->set_attrib("data-toggle", TRUE));

        $title_bar_title = $title->append_h1(NULL, "title-bar-title k1lib-title-container");
        $title_bar_title->set_attrib("style", "font-size:inherit;display:inline");
        $title_bar_title->append_span("k1lib-title-1");
        $title_bar_title->append_span("k1lib-title-2");
        $title_bar_title->append_span("k1lib-title-3");
    }

    /**
     * Gets the left dropdown menu
     *
     * @return \k1lib\html\ul The left menu element
     */
    function menu_left() {
        return $this->menu_left;
    }

    /**
     * Gets the right dropdown menu
     *
     * @return \k1lib\html\ul The right menu element
     */
    function menu_right() {
        return $this->menu_right;
    }

    /**
     * Gets the parent element
     *
     * @return \k1lib\html\tag The parent element
     */
    function get_parent() {
        return $this->parent;
    }
}