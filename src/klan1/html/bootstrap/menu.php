<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Menu component
 *
 * A flexible menu component supporting horizontal, vertical, dropdown,
 * drilldown, and accordion navigation styles. Built on Foundation
 *-inspired menu patterns with Bootstrap styling.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version 1.0.0
 */
class menu extends \k1lib\html\ul {

    /**
     * Menu type: standard horizontal/vertical menu
     */
    const TYPE_MENU = 'menu';

    /**
     * Menu type: dropdown menu with submenus
     */
    const TYPE_DROPDOWN = 'dropdown';

    /**
     * Menu type: drilldown navigation (mobile-friendly)
     */
    const TYPE_DRILLDOWN = 'drilldown';

    /**
     * Menu type: accordion-style expandable items
     */
    const TYPE_ACCORDION = 'accordion';

    /**
     * Current menu type
     * @var string
     */
    protected $type = '';

    /**
     * Whether menu is vertically oriented
     * @var bool
     */
    protected $is_vertical = false;

    /**
     * CSS classes for the menu
     * @var string
     */
    protected $menu_class = '';

    /**
     * CSS classes for nested submenus
     * @var string
     */
    protected $nested_class = '';

    /**
     * Data attribute for JavaScript initialization
     * @var string
     */
    protected $data_attribute = '';

    /**
     * Creates a new Menu instance
     *
     * @param string $type Menu type: TYPE_MENU, TYPE_DROPDOWN, TYPE_DRILLDOWN, or TYPE_ACCORDION
     * @param string|null $sub_class Custom CSS class to override defaults
     * @param bool $vertical Stack menu items vertically
     */
    function __construct($type = 'menu', $sub_class = NULL, $vertical = FALSE) {
        $this->type = $type;
        $this->is_vertical = $vertical;
        switch ($type) {
            case 'menu':
                if ($vertical) {
                    $this->menu_class = 'menu vertical';
                } else {
                    $this->menu_class = 'menu';
                }
                $this->nested_class = '';
                $this->data_attribute = '';

                break;
            case 'dropdown':
                if ($vertical) {
                    $this->menu_class = 'dropdown menu vertical';
                } else {
                    $this->menu_class = 'dropdown menu';
                }
                $this->nested_class = 'menu';
                $this->data_attribute = 'data-dropdown-menu';

                break;
            case 'drilldown':
                $vertical = TRUE;
                $this->menu_class = 'vertical menu drilldown';
                $this->nested_class = 'menu vertical nested';
                $this->data_attribute = 'data-drilldown';

                break;
            case 'accordion':
                $vertical = TRUE;
                $this->menu_class = 'vertical menu accordion-menu';
                $this->nested_class = 'menu vertical nested';
                $this->data_attribute = 'data-accordion-menu';

                break;

            default:
                break;
        }
        if (!empty($sub_class)) {
            $this->menu_class = $sub_class;
        }
        parent::__construct($this->menu_class, NULL);
        if (empty($sub_class)) {
            $this->set_attrib($this->data_attribute, TRUE);
        }
    }

    /**
     * Adds a menu item at the root level or under a parent
     *
     * @param string $href URL the menu item links to (empty string for plain text item)
     * @param string $label Display text for the menu item
     * @param string|null $id Unique ID for the menu item
     * @param string|null $where_id Parent menu item ID to nest under
     * @return \k1lib\html\li The created list item
     */
    function add_menu_item($href, $label, $id = NULL, $where_id = NULL) {
        $parent = NULL;
        if (!empty($where_id)) {
            $parent = $this->get_element_by_id($where_id);
        }
        if (empty($parent)) {
            $li = $this->append_li();
            $li->set_id($id);
            if (!empty($href)) {
                $a = $li->append_a($href, $label);
                $li->link_value_obj($a);
            } else {
                $li->set_value($label);
            }
        } else {
            $ul = new menu($this->type, $this->nested_class, $this->is_vertical);
            $parent->append_child($ul);
            $li = $ul->add_menu_item($href, $label, $id);
        }
        return $li;
    }

    /**
     * Adds a submenu (nested menu) under an existing item
     *
     * @param string $href URL for the parent item link
     * @param string $label Display text for the parent item
     * @param string|null $id Unique ID for the parent item
     * @param string|null $where_id Parent menu item ID to nest under
     * @return menu The newly created submenu
     */
    function add_sub_menu($href, $label, $id = NULL, $where_id = NULL) {
        $parent = NULL;
        if (!empty($where_id)) {
            $parent = $this->get_element_by_id($where_id);
        }
        if (empty($parent)) {
            $li = $this->add_menu_item($href, $label, $id);
            $li->unlink_value_obj();
        } else {
            $ul = new menu($this->type, $this->nested_class, $this->is_vertical);
            $parent->append_child($ul);
            $li = $ul->add_menu_item($href, $label, $id);
        }
        $li->set_class("has-submenu", TRUE);
        $ul = new menu($this->type, $this->nested_class, $this->is_vertical);
        $li->append_child($ul);
        return $ul;
    }

    /**
     * Marks a menu item as active by its ID
     *
     * @param string $id The ID of the menu item to mark as active
     */
    function set_active($id) {
        $tag = $this->get_element_by_id($id);
        if (!empty($tag)) {
            $tag->unlink_value_obj();
            $tag->set_class('active', TRUE);
        }
    }
}