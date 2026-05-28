<?php

namespace k1lib\html\bootstrap\components;

use k1lib\html\div;
use k1lib\html\button;

/**
 * Bootstrap 5 Nav component
 *
 * A flexible navigation component for creating tabbed interfaces, pill
 * navigations, and underline-styled navbars. Supports horizontal and
 * vertical layouts, dropdown menus, filled/justified elements, and
 * can generate complete tab interfaces with content panes.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://getbootstrap.com/docs/5.3/components/navs-tabs/
 * @license Apache-2.0
 * @version 1.0.0
 */
class nav extends \k1lib\html\ul {

    /**
     * Tabs-style navigation (bordered tabs)
     */
    const TYPE_TABS = 'tabs';

    /**
     * Pills-style navigation (rounded buttons)
     */
    const TYPE_PILLS = 'pills';

    /**
     * Underline-style navigation (Bootstrap 5 native)
     */
    const TYPE_UNDERLINE = 'underline';

    /**
     * Current navigation type
     * @var string
     */
    protected $type = 'tabs';

    /**
     * Navigation items configuration
     * @var array
     */
    protected $items = [];

    /**
     * Horizontal alignment: start, center, end
     * @var string
     */
    protected $aligned = 'start';

    /**
     * Use nav-fill for proportionate filling
     * @var bool
     */
    protected $filled = false;

    /**
     * Use nav-justified for equal-width items
     * @var bool
     */
    protected $justified = false;

    /**
     * Stack items vertically
     * @var bool
     */
    protected $vertical = false;

    /**
     * Creates a new Nav instance
     *
     * @param array $items Array of nav items. Each item can be:
     *   - ['text' => '', 'href' => '', 'active' => bool, 'disabled' => bool]
     *   - ['text' => '', 'dropdown' => [...dropdown items...]]
     * @param string $type Navigation style: TYPE_TABS, TYPE_PILLS, or TYPE_UNDERLINE
     * @param bool $vertical Stack items vertically with flex-column
     * @param string $alignment Horizontal alignment: 'start', 'center', or 'end'
     * @param bool $filled Use nav-fill to proportionately fill available space
     * @param bool $justified Use nav-justified for equal-width elements
     */
    public function __construct(
        $items = [],
        $type = 'tabs',
        $vertical = false,
        $alignment = 'start',
        $filled = false,
        $justified = false
    ) {
        parent::__construct('nav', NULL);

        $this->type = $type;
        $this->vertical = $vertical;
        $this->aligned = $alignment;
        $this->filled = $filled;
        $this->justified = $justified;
        $this->items = $items;

        $this->apply_styles();
        $this->build_items();
    }

    /**
     * Applies Bootstrap CSS classes based on configuration
     */
    protected function apply_styles(): void {
        $classes = ['nav'];

        switch ($this->type) {
            case self::TYPE_TABS:
                $classes[] = 'nav-tabs';
                break;
            case self::TYPE_PILLS:
                $classes[] = 'nav-pills';
                break;
            case self::TYPE_UNDERLINE:
                $classes[] = 'nav-underline';
                break;
        }

        if ($this->vertical) {
            $classes[] = 'flex-column';
        }

        switch ($this->aligned) {
            case 'center':
                $classes[] = 'justify-content-center';
                break;
            case 'end':
                $classes[] = 'justify-content-end';
                break;
        }

        if ($this->filled) {
            $classes[] = 'nav-fill';
        }

        if ($this->justified) {
            $classes[] = 'nav-justified';
        }

        $this->set_class(implode(' ', $classes));
    }

    /**
     * Builds nav items from the items array
     */
    protected function build_items(): void {
        foreach ($this->items as $item) {
            if (isset($item['dropdown'])) {
                $this->add_dropdown_item(
                    $item['text'] ?? '',
                    $item['dropdown']
                );
            } else {
                $this->add_item(
                    $item['text'] ?? '',
                    $item['href'] ?? '#',
                    $item['active'] ?? false,
                    $item['disabled'] ?? false
                );
            }
        }
    }

    /**
     * Adds a simple navigation item
     *
     * @param string $text Display text for the link
     * @param string $href URL the item links to
     * @param bool $active Mark as the currently active item
     * @param bool $disabled Mark as disabled (non-clickable)
     * @return \k1lib\html\li The created list item
     */
    public function add_item($text, $href = '#', $active = false, $disabled = false) {
        $li = $this->append_li(NULL, 'nav-item');

        $a = $li->append_a($href, $text);
        $a->set_class('nav-link');

        if ($active) {
            $a->set_class('active', TRUE);
            $a->set_attrib('aria-current', 'page');
        }

        if ($disabled) {
            $a->set_class('disabled', TRUE);
            $a->set_attrib('aria-disabled', 'true');
        }

        return $li;
    }

    /**
     * Adds a dropdown navigation item
     *
     * @param string $text Display text for the dropdown trigger
     * @param array $dropdown_items Array of dropdown item configurations:
     *   - ['text' => '', 'href' => '', 'active' => bool, 'disabled' => bool]
     *   - ['divider' => true] for a separator line
     * @return \k1lib\html\li The created list item containing the dropdown
     */
    public function add_dropdown_item($text, $dropdown_items) {
        $li = $this->append_li(NULL, 'nav-item dropdown');

        $a = $li->append_a('#', $text);
        $a->set_class('nav-link dropdown-toggle');
        $a->set_attrib('data-bs-toggle', 'dropdown');
        $a->set_attrib('role', 'button');
        $a->set_attrib('aria-expanded', 'false');

        $ul = $li->append_ul('dropdown-menu');

        foreach ($dropdown_items as $item) {
            if (isset($item['divider']) && $item['divider']) {
                $li_dropdown = $ul->append_li();
                $li_dropdown->set_class('dropdown-divider');
            } else {
                $li_dropdown = $ul->append_li();
                $a_dropdown = $li_dropdown->append_a($item['href'] ?? '#', $item['text'] ?? '');
                $a_dropdown->set_class('dropdown-item');

                if (isset($item['active']) && $item['active']) {
                    $a_dropdown->set_class('active', TRUE);
                }

                if (isset($item['disabled']) && $item['disabled']) {
                    $a_dropdown->set_class('disabled', TRUE);
                    $a_dropdown->set_attrib('aria-disabled', 'true');
                }
            }
        }

        return $li;
    }

    /**
     * Creates a complete tabbed interface with navigation and content panes
     *
     * @param string $tab_id Base ID prefix for the tab elements
     * @param array $tabs Array of tab configurations:
     *   - 'id' (string): Unique tab identifier
     *   - 'label' (string): Tab button text
     *   - 'content' (string): HTML content for the tab pane
     *   - 'active' (bool): Set as initially active tab
     *   - 'disabled' (bool): Disable the tab button
     * @return array Contains:
     *   - 'nav': The nav component with tab buttons
     *   - 'content': The div containing tab panes
     */
    public static function create_tabs($tab_id, $tabs) {
        $nav = new nav([], 'tabs');
        $nav->set_id($tab_id . '-tab');
        $nav->set_attrib('role', 'tablist');

        $content = new div();
        $content->set_class('tab-content');
        $content->set_id($tab_id . '-tabContent');

        $first = true;
        foreach ($tabs as $tab) {
            $tab_pane_id = $tab['id'] ?? uniqid('tab_');
            $label = $tab['label'] ?? 'Tab';
            $tab_content = $tab['content'] ?? '';
            $is_active = $tab['active'] ?? $first;

            $li = $nav->append_li(NULL, 'nav-item');
            $li->set_attrib('role', 'presentation');

            $button_el = new button(NULL, 'nav-link' . ($is_active ? ' active' : ''));
            $button_el->set_attrib('data-bs-toggle', 'tab');
            $button_el->set_attrib('data-bs-target', '#' . $tab_pane_id);
            $button_el->set_attrib('type', 'button');
            $button_el->set_attrib('role', 'tab');
            $button_el->set_attrib('aria-controls', $tab_pane_id);
            $button_el->set_attrib('aria-selected', $is_active ? 'true' : 'false');
            $button_el->set_value($label);

            if (isset($tab['disabled']) && $tab['disabled']) {
                $button_el->set_class('disabled', TRUE);
                $button_el->set_attrib('aria-disabled', 'true');
                $button_el->remove_attrib('data-bs-toggle');
            }

            $li->append_child($button_el);

            $tab_pane = new div();
            $tab_pane->set_class('tab-pane fade' . ($is_active ? ' show active' : ''));
            $tab_pane->set_id($tab_pane_id);
            $tab_pane->set_attrib('role', 'tabpanel');
            $tab_pane->set_attrib('aria-labelledby', $tab_pane_id . '-tab');
            $tab_pane->set_attrib('tabindex', '0');
            $tab_pane->set_value($tab_content);

            $content->append_child($tab_pane);

            $first = false;
        }

        return ['nav' => $nav, 'content' => $content];
    }

    /**
     * Creates a vertical pill navigation with content panes
     *
     * @param string $tab_id Base ID prefix for the tab elements
     * @param array $tabs Array of tab configurations (same as create_tabs)
     * @return array Contains:
     *   - 'wrapper': Wrapper div containing nav and content
     *   - 'nav': The nav component with vertical pills
     *   - 'content': The div containing tab panes
     */
    public static function create_vertical_pills($tab_id, $tabs) {
        $wrapper = new div();
        $wrapper->set_class('d-flex align-items-start');

        $nav = new nav([], 'pills', true);
        $nav->set_id($tab_id . '-v-pills-tab');
        $nav->set_attrib('role', 'tablist');
        $nav->set_attrib('aria-orientation', 'vertical');

        $content = new div();
        $content->set_class('tab-content');
        $content->set_id($tab_id . '-v-pills-tabContent');

        $first = true;
        foreach ($tabs as $tab) {
            $tab_pane_id = $tab['id'] ?? uniqid('tab_');
            $label = $tab['label'] ?? 'Tab';
            $tab_content = $tab['content'] ?? '';
            $is_active = $tab['active'] ?? $first;

            $button_el = new button(NULL, 'nav-link' . ($is_active ? ' active' : ''));
            $button_el->set_attrib('id', $tab_pane_id . '-tab');
            $button_el->set_attrib('data-bs-toggle', 'pill');
            $button_el->set_attrib('data-bs-target', '#' . $tab_pane_id);
            $button_el->set_attrib('type', 'button');
            $button_el->set_attrib('role', 'tab');
            $button_el->set_attrib('aria-controls', $tab_pane_id);
            $button_el->set_attrib('aria-selected', $is_active ? 'true' : 'false');
            $button_el->set_value($label);

            if (isset($tab['disabled']) && $tab['disabled']) {
                $button_el->set_class('disabled', TRUE);
                $button_el->set_attrib('aria-disabled', 'true');
                $button_el->remove_attrib('data-bs-toggle');
            }

            $nav->append_child($button_el);

            $tab_pane = new div();
            $tab_pane->set_class('tab-pane fade' . ($is_active ? ' show active' : ''));
            $tab_pane->set_id($tab_pane_id);
            $tab_pane->set_attrib('role', 'tabpanel');
            $tab_pane->set_attrib('aria-labelledby', $tab_pane_id . '-tab');
            $tab_pane->set_attrib('tabindex', '0');
            $tab_pane->set_value($tab_content);

            $content->append_child($tab_pane);

            $first = false;
        }

        $wrapper->append_child($nav);
        $wrapper->append_child($content);

        return ['wrapper' => $wrapper, 'nav' => $nav, 'content' => $content];
    }
}