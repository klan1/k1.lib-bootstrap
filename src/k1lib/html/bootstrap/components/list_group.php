<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 List Group component
 *
 * A flexible component for displaying a series of content. Supports
 * multiple item types (links or list items), states (active, disabled),
 * and contextual color variants.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/list-group.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class list_group extends \k1lib\html\div {
    use bootstrap_assets;

    use bootstrap_methods;

    /**
     * Whether to use flush (borderless) styling
     * @var bool
     */
    protected $flush = FALSE;

    /**
     * Creates a new List Group instance
     *
     * @param array $items Array of item configurations. Each item can have:
     *   - 'text' (string): Item display text
     *   - 'href' (string): URL for link-style items (omit for list-item style)
     *   - 'active' (bool): Mark as active/selected
     *   - 'disabled' (bool): Mark as disabled
     *   - 'variant' (string): Contextual color variant (primary, secondary, success, danger, warning, info, light, dark)
     * @param bool $flush Remove some borders and rounded corners for edge-to-edge styling
     */
    public function __construct($items = [], $flush = FALSE, $numbered = FALSE, $horizontal = FALSE) {
        self::require_assets();
        $this->flush = $flush;
        $class = 'list-group';
        if ($flush) {
            $class .= ' list-group-flush';
        }
        parent::__construct($class, NULL);

        if ($numbered) {
            $this->set_numbered(TRUE);
        }
        if ($horizontal) {
            $this->set_horizontal(TRUE);
        }

        if (!empty($items)) {
            $this->add_items($items);
        }
    }

    /**
     * Sets the numbered variant (ol.list-group-numbered)
     *
     * @param bool $numbered Whether to use numbered items
     * @return $this For method chaining
     */
    public function set_numbered($numbered = TRUE) {
        if ($numbered) {
            $this->set_tag_name('ol');
            $this->set_class('list-group-numbered', TRUE);
        } else {
            $this->set_tag_name('div');
            $this->remove_attribute_text('class', 'list-group-numbered');
        }
        return $this;
    }

    /**
     * Sets the horizontal variant
     *
     * @param bool $horizontal Whether to use the horizontal layout
     * @return $this For method chaining
     */
    public function set_horizontal($horizontal = TRUE) {
        if ($horizontal) {
            $this->set_class('list-group-horizontal', TRUE);
        } else {
            $this->remove_attribute_text('class', 'list-group-horizontal');
        }
        return $this;
    }

    /**
     * Adds a single item to the list group
     *
     * @param string $text Item display text
     * @param string|null $href URL for link-style items. If NULL, creates a list-item element
     * @param bool $active Mark as active/selected state
     * @param bool $disabled Mark as disabled state
     * @param string|null $variant Contextual color variant
     * @return \k1lib\html\tag The created element (a or li)
     */
    public function add_item($text = '', $href = NULL, $active = FALSE, $disabled = FALSE, $variant = NULL, $badge = NULL, $content = NULL) {
        $badge_tag = NULL;
        if ($badge !== NULL) {
            $badge_tag = new \k1lib\html\span('badge bg-primary rounded-pill');
            $badge_tag->set_value($badge);
        }

        if ($href !== NULL) {
            $a = new \k1lib\html\a($href, ($content instanceof \k1lib\html\tag) ? '' : $text);
            $a->set_class('list-group-item list-group-item-action');
            if ($active) {
                $a->set_class('active', TRUE);
                $a->set_attrib('aria-current', 'true');
            }
            if ($disabled) {
                $a->set_class('disabled', TRUE);
                $a->set_attrib('tabindex', '-1');
                $a->set_attrib('aria-disabled', 'true');
            }
            if ($variant) {
                $a->set_class("list-group-item-{$variant}", TRUE);
            }
            if ($content instanceof \k1lib\html\tag) {
                $a->append_child($content);
            }
            if ($badge_tag !== NULL) {
                $a->append_child($badge_tag);
            }
            $this->append_child($a);
            return $a;
        } else {
            $item_div = new \k1lib\html\div('list-group-item');
            if ($active) {
                $item_div->set_class('active', TRUE);
                $item_div->set_attrib('aria-current', 'true');
            }
            if ($disabled) {
                $item_div->set_class('disabled', TRUE);
            }
            if ($variant) {
                $item_div->set_class("list-group-item-{$variant}", TRUE);
            }
            if ($content instanceof \k1lib\html\tag) {
                $item_div->append_child($content);
            } else {
                $item_div->set_value($text);
            }
            if ($badge_tag !== NULL) {
                $item_div->append_child($badge_tag);
            }
            $this->append_child($item_div);
            return $item_div;
        }
    }

    /**
     * Adds multiple items to the list group
     *
     * @param array $items Array of item configurations. See add_item() for structure.
     * @return $this For method chaining
     */
    public function add_items(array $items): static {
        foreach ($items as $item) {
            $text = $item['text'] ?? '';
            $href = $item['href'] ?? NULL;
            $active = $item['active'] ?? FALSE;
            $disabled = $item['disabled'] ?? FALSE;
            $variant = $item['variant'] ?? NULL;
            $badge = $item['badge'] ?? NULL;
            $content = $item['content'] ?? NULL;
            $this->add_item($text, $href, $active, $disabled, $variant, $badge, $content);
        }
        return $this;
    }
}
