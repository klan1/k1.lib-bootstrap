<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Navbar component
 *
 * A responsive navigation header that includes support for branding,
 * navigation links, dropdown menus, forms, and collapsible content
 * via Bootstrap's navbar JavaScript plugin.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/navbar.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class navbar extends \k1lib\html\nav {

    /**
     * Brand element (link or image)
     * @var \k1lib\html\a|\k1lib\html\img|null
     */
    protected $brand = NULL;

    /**
     * Mobile menu toggler button
     * @var \k1lib\html\button
     */
    protected $toggler = NULL;

    /**
     * Collapsible content div
     * @var \k1lib\html\div
     */
    protected $collapse = NULL;

    /**
     * Navigation links container ul
     * @var \k1lib\html\ul
     */
    protected $nav = NULL;

    /**
     * Container div (fluid or fixed width)
     * @var \k1lib\html\div
     */
    protected $container = NULL;

    /**
     * Creates a new Navbar instance
     *
     * @param string $brand Brand text or leave empty for no brand
     * @param string $id Unique identifier for the navbar
     * @param string $color Color theme: 'light' or 'dark'
     * @param string $expand Breakpoint for responsive expansion: 'sm', 'md', 'lg', 'xl', 'xxl'
     * @param string $container_type Container type: 'container' or 'container-fluid'
     */
    public function __construct($brand = '', $id = 'mainNavbar', $color = 'light', $expand = 'lg', $container_type = 'container-fluid') {
        $classes = "navbar navbar-expand-{$expand} navbar-{$color}";
        parent::__construct(NULL, $classes, $id);
        $this->set_attrib('data-bs-theme', $color === 'dark' ? 'dark' : 'light');

        $this->container = new \k1lib\html\div($container_type);
        $this->append_child($this->container);

        if (!empty($brand)) {
            $this->brand = new \k1lib\html\a('#', $brand);
            $this->brand->set_class('navbar-brand');
            $this->container->append_child($this->brand);
        }

        $this->toggler = new \k1lib\html\button();
        $this->toggler->set_class('navbar-toggler');
        $this->toggler->set_attrib('type', 'button');
        $this->toggler->set_attrib('data-bs-toggle', 'collapse');
        $this->toggler->set_attrib('data-bs-target', '#' . $id . '-collapse');
        $this->toggler->set_attrib('aria-controls', $id . '-collapse');
        $this->toggler->set_attrib('aria-expanded', 'false');
        $this->toggler->set_attrib('aria-label', 'Toggle navigation');

        $toggler_icon = new \k1lib\html\span('navbar-toggler-icon');
        $this->toggler->append_child($toggler_icon);
        $this->container->append_child($this->toggler);

        $this->collapse = new \k1lib\html\div('collapse navbar-collapse');
        $this->collapse->set_attrib('id', $id . '-collapse');

        $this->nav = new \k1lib\html\ul('navbar-nav me-auto mb-2 mb-lg-0');
        $this->collapse->append_child($this->nav);

        $this->container->append_child($this->collapse);
    }

    /**
     * Adds a navigation item
     *
     * @param string $text Item display text
     * @param string $href URL the item links to
     * @param bool $active Mark as the currently active page
     * @param bool $disabled Mark as disabled
     * @param array|null $dropdown If provided, creates a dropdown menu with the given items.
     *        Each item should have 'text' and 'href' keys, or be 'divider' for a separator.
     * @return \k1lib\html\li The created list item
     */
    public function add_item($text = '', $href = '#', $active = FALSE, $disabled = FALSE, $dropdown = NULL) {
        $li = $this->nav->append_li();
        $li->set_class('nav-item');

        if ($dropdown !== NULL) {
            $li->set_class('dropdown', TRUE);
            $a = new \k1lib\html\a('#', $text);
            $a->set_class('nav-link dropdown-toggle');
            $a->set_attrib('data-bs-toggle', 'dropdown');
            $a->set_attrib('role', 'button');
            $a->set_attrib('aria-expanded', 'false');
            $li->append_child($a);

            $dropdown_menu = new \k1lib\html\ul('dropdown-menu');
            $li->append_child($dropdown_menu);

            if (is_array($dropdown)) {
                foreach ($dropdown as $item) {
                    if ($item === 'divider') {
                        $dropdown_li = $dropdown_menu->append_li();
                        $dropdown_li->set_class('dropdown-divider');
                    } else {
                        $dropdown_li = $dropdown_menu->append_li();
                        $dropdown_a = $dropdown_li->append_a($item['href'], $item['text']);
                        $dropdown_a->set_class('dropdown-item');
                        if (isset($item['active']) && $item['active']) {
                            $dropdown_a->set_class('active', TRUE);
                        }
                    }
                }
            }
        } else {
            $a = $li->append_a($href, $text);
            $a->set_class('nav-link');
        }

        if ($active) {
            $a->set_class('active', TRUE);
            $a->set_attrib('aria-current', 'page');
        }
        if ($disabled) {
            $a->set_class('disabled', TRUE);
            $a->set_attrib('tabindex', '-1');
            $a->set_attrib('aria-disabled', 'true');
        }

        return $li;
    }

    /**
     * Adds text content to the navbar
     *
     * @param string $text Text content to display
     * @param string $margin_start CSS margin start class (e.g., 'auto' for push to end)
     * @return \k1lib\html\span The created span element
     */
    public function add_text($text = '', $margin_start = 'auto') {
        $span = new \k1lib\html\span($text);
        $span->set_class("navbar-text me-{$margin_start}");
        if ($this->brand instanceof \k1lib\html\a) {
            $this->brand->append_child($span);
        } else {
            $this->collapse->append_child($span);
        }
        return $span;
    }

    /**
     * Adds a search form to the navbar
     *
     * @param string $placeholder Input placeholder text
     * @param string $button_text Search button text
     * @param string $button_class Bootstrap button classes
     * @param string $input_name Name attribute for the input
     * @return \k1lib\html\form The created form element
     */
    public function add_form($placeholder = 'Search', $button_text = 'Search', $button_class = 'btn-outline-success', $input_name = 'search') {
        $form = new \k1lib\html\form();
        $form->set_class('d-flex');
        $form->set_attrib('role', 'search');

        $input = new \k1lib\html\input('text', $input_name, '');
        $input->set_class('form-control me-2');
        $input->set_attrib('type', 'text');
        $input->set_attrib('name', $input_name);
        $input->set_attrib('placeholder', $placeholder);
        $input->set_attrib('aria-label', $placeholder);
        $form->append_child($input);

        $button = new \k1lib\html\button();
        $button->set_class("btn {$button_class}");
        $button->set_attrib('type', 'submit');
        $button->set_value($button_text);
        $form->append_child($button);

        $this->collapse->append_child($form);
        return $form;
    }

    /**
     * Sets the navbar placement (fixed or sticky position)
     *
     * @param string $placement Position: 'fixed-top', 'fixed-bottom', 'sticky-top', or 'sticky-bottom'
     * @param bool $add_background Add a background color class
     * @return $this For method chaining
     */
    public function set_placement($placement = 'fixed-top', $add_background = true) {
        $valid_placements = ['fixed-top', 'fixed-bottom', 'sticky-top', 'sticky-bottom'];
        if (in_array($placement, $valid_placements)) {
            $this->set_class($placement, TRUE);
            if ($add_background) {
                $this->set_class('bg-body-tertiary', TRUE);
            }
        }
        return $this;
    }

    /**
     * Sets a brand image instead of text
     *
     * @param string $src Image source URL
     * @param string $alt Image alt text
     * @param int $width Image width in pixels
     * @param int $height Image height in pixels
     * @param string $href Link destination for the brand image
     * @return \k1lib\html\a The brand anchor element
     */
    public function set_brand_image($src, $alt = '', $width = 30, $height = 24, $href = '#') {
        $this->brand = new \k1lib\html\a($href, '');
        $this->brand->set_class('navbar-brand');

        $img = new \k1lib\html\img($src, $alt);
        $img->set_attrib('width', $width);
        $img->set_attrib('height', $height);
        $img->set_class('d-inline-block align-text-top');

        $this->brand->append_child($img);
        $this->container->append_child_head($this->brand);
        return $this->brand;
    }

    /**
     * Gets the brand element
     *
     * @return \k1lib\html\a|\k1lib\html\img|null The brand element
     */
    public function brand() {
        return $this->brand;
    }

    /**
     * Gets the collapse element
     *
     * @return \k1lib\html\div The collapse container element
     */
    public function collapse() {
        return $this->collapse;
    }
}