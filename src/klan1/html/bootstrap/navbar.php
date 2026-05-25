<?php

namespace k1lib\html\bootstrap;

class navbar extends \k1lib\html\nav {

    protected $brand = NULL;
    protected $toggler = NULL;
    protected $collapse = NULL;
    protected $nav = NULL;
    protected $container = NULL;

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

    public function brand() {
        return $this->brand;
    }

    public function collapse() {
        return $this->collapse;
    }
}
