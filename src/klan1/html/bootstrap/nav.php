<?php

namespace k1lib\html\bootstrap;

use k1lib\html\div;
use k1lib\html\button;

/**
 * Bootstrap 5 Nav component
 *
 * Base nav component for creating navigation bars and tabbed interfaces.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://getbootstrap.com/docs/5.3/components/navs-tabs/
 * @license Apache-2.0
 */
class nav extends \k1lib\html\ul {

    const TYPE_TABS = 'tabs';
    const TYPE_PILLS = 'pills';
    const TYPE_UNDERLINE = 'underline';

    protected $type = 'tabs';
    protected $items = [];
    protected $aligned = 'start';
    protected $filled = false;
    protected $justified = false;
    protected $vertical = false;

    /**
     * @param array $items Array of items. Each item can be:
     *   - ['text' => '', 'href' => '', 'active' => bool, 'disabled' => bool]
     *   - ['text' => '', 'dropdown' => [...dropdown items...]]
     * @param string $type Nav type: tabs, pills, underline
     * @param bool $vertical Stack vertically with flex-column
     * @param string $alignment Horizontal alignment: start, center, end
     * @param bool $filled Use nav-fill to proportionately fill space
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

    protected function apply_styles() {
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

    protected function build_items() {
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
     * Add a simple nav item
     *
     * @param string $text
     * @param string $href
     * @param bool $active
     * @param bool $disabled
     * @return \k1lib\html\li
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
     * Add a dropdown item
     *
     * @param string $text Dropdown trigger text
     * @param array $dropdown_items Array of ['text' => '', 'href' => ''] or ['divider' => true]
     * @return \k1lib\html\li
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
     * Create a tabbed interface with content panes
     *
     * @param string $tab_id Base ID for the tab
     * @param array $tabs Array of ['id' => '', 'label' => '', 'content' => '', 'active' => bool]
     * @return array ['nav' => nav, 'content' => div]
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
     * Create vertical pills with content panes
     *
     * @param string $tab_id Base ID for the tab
     * @param array $tabs Array of ['id' => '', 'label' => '', 'content' => '', 'active' => bool]
     * @return array ['wrapper' => div, 'nav' => nav, 'content' => div]
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