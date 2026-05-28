<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Accordion component
 *
 * Build vertically collapsing accordions in combination with our Collapse JavaScript plugin.
 * Supports: default (one open at a time), always-open, flush, and open-by-default modes.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/accordion.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class accordion extends \k1lib\html\div {

    use bootstrap_methods;

    /**
     * Default mode: only one item open at a time
     */
    const MODE_DEFAULT = 'default';

    /**
     * Always-open mode: multiple items can be open simultaneously
     */
    const MODE_ALWAYS_OPEN = 'always-open';

    /**
     * @var string Accordion ID
     */
    private $accordion_id;

    /**
     * @var string Mode: default (one open at a time) or always-open
     */
    private $mode = self::MODE_DEFAULT;

    /**
     * @var bool Flush variant (edge-to-edge)
     */
    private $flush = false;

    /**
     * @var array accordion items, keyed by item ID
     */
    private $items = [];

    /**
     * @var int Counter for auto-generated IDs
     */
    private $item_counter = 0;

    /**
     * @var array IDs of items that should be open by default
     */
    private $default_open_items = [];

    /**
     * @var \k1lib\html\div The accordion container
     */
    private $container;

    /**
     * Creates a Bootstrap 5 Accordion
     *
     * @param string $id Accordion ID (will be prefixed to item IDs)
     * @param string $mode Mode: accordion::MODE_DEFAULT or accordion::MODE_ALWAYS_OPEN
     * @param bool $flush Add accordion-flush class for edge-to-edge styling
     */
    public function __construct($id = 'accordion', $mode = self::MODE_DEFAULT, $flush = false) {
        $this->accordion_id = $id;
        $this->mode = $mode;
        $this->flush = $flush;

        $classes = 'accordion';
        if ($this->flush) {
            $classes .= ' accordion-flush';
        }

        parent::__construct($classes, $this->accordion_id);
        $this->container = $this;
    }

    /**
     * Add an accordion item
     *
     * @param string $title Button/title text
     * @param string| callable $content Body content (string or callable that returns HTML)
     * @param string|null $item_id Custom item ID (auto-generated if null)
     * @param bool $is_default_open If true, this item starts open
     * @return $this
     */
    public function add_item($title, $content = '', $item_id = null, $is_default_open = false): static {
        $this->item_counter++;
        if ($item_id === null) {
            $item_id = 'item-' . $this->item_counter;
        }

        $collapse_id = 'collapse-' . $this->accordion_id . '-' . $item_id;
        $button_id = 'button-' . $this->accordion_id . '-' . $item_id;
        $is_open = $is_default_open || in_array($item_id, $this->default_open_items);

        $item = new \k1lib\html\div('accordion-item');

        $header = new \k1lib\html\h2(NULL, 'accordion-header');

        $button = new \k1lib\html\button();
        $button->set_attrib('type', 'button');
        $button->set_class('accordion-button');
        if (!$is_open) {
            $button->set_class('collapsed', TRUE);
        }
        $button->set_attrib('data-bs-toggle', 'collapse');
        $button->set_attrib('data-bs-target', '#' . $collapse_id);
        $button->set_attrib('aria-expanded', $is_open ? 'true' : 'false');
        $button->set_attrib('aria-controls', $collapse_id);
        if (isset($button_id)) {
            $button->set_attrib('id', $button_id);
        }
        $button->set_value($title);

        $header->append_child($button);
        $item->append_child($header);

        $collapse = new \k1lib\html\div('accordion-collapse collapse');
        if ($is_open) {
            $collapse->set_class('show', TRUE);
        }
        $collapse->set_attrib('id', $collapse_id);
        if ($this->mode === self::MODE_DEFAULT) {
            $collapse->set_attrib('data-bs-parent', '#' . $this->accordion_id);
        }

        $body = new \k1lib\html\div('accordion-body');

        if (is_callable($content)) {
            $content_html = $content();
            if ($content_html instanceof \k1lib\html\tag) {
                $body->append_child($content_html);
            } else {
                $body->set_value($content_html);
            }
        } else {
            $body->set_value($content);
        }

        $collapse->append_child($body);
        $item->append_child($collapse);

        $this->container->append_child($item);
        $this->items[$item_id] = [
            'item' => $item,
            'header' => $header,
            'button' => $button,
            'collapse' => $collapse,
            'body' => $body,
            'collapse_id' => $collapse_id,
        ];

        return $this;
    }

    /**
     * Add multiple items at once
     *
     * @param array $items Array of items, each with 'title', 'content', 'id', 'default_open' keys
     * @return $this
     */
    public function add_items(array $items): static {
        foreach ($items as $item_config) {
            $title = $item_config['title'] ?? '';
            $content = $item_config['content'] ?? '';
            $item_id = $item_config['id'] ?? null;
            $default_open = $item_config['default_open'] ?? false;

            $this->add_item($title, $content, $item_id, $default_open);
        }
        return $this;
    }

    /**
     * Set item(s) to be open by default
     *
     * @param string|array $item_ids Single ID or array of IDs
     * @return $this
     */
    public function set_default_open($item_ids): static {
        if (!is_array($item_ids)) {
            $item_ids = [$item_ids];
        }
        $this->default_open_items = $item_ids;
        return $this;
    }

    /**
     * Get an item's body container to add content
     *
     * @param string $item_id
     * @return \k1lib\html\div|null
     */
    public function item_body($item_id): \k1lib\html\div|null {
        return $this->items[$item_id]['body'] ?? null;
    }

    /**
     * Get item button for customization
     *
     * @param string $item_id
     * @return \k1lib\html\button|null
     */
    public function item_button($item_id): \k1lib\html\button|null {
        return $this->items[$item_id]['button'] ?? null;
    }

    /**
     * Get item collapse element
     *
     * @param string $item_id
     * @return \k1lib\html\div|null
     */
    public function item_collapse($item_id): \k1lib\html\div|null {
        return $this->items[$item_id]['collapse'] ?? null;
    }

    /**
     * Get item header element
     *
     * @param string $item_id
     * @return \k1lib\html\div|null
     */
    public function item_header($item_id): \k1lib\html\div|null {
        return $this->items[$item_id]['header'] ?? null;
    }

    /**
     * Get the accordion container
     *
     * @return \k1lib\html\div
     */
    public function container(): \k1lib\html\div {
        return $this->container;
    }

    /**
     * Check if accordion has an item
     *
     * @param string $item_id
     * @return bool
     */
    public function has_item($item_id): bool {
        return isset($this->items[$item_id]);
    }

    /**
     * Get all item IDs
     *
     * @return array
     */
    public function get_item_ids(): array {
        return array_keys($this->items);
    }

    /**
     * Get item count
     *
     * @return int
     */
    public function count() {
        return count($this->items);
    }

    /**
     * Remove an item by ID
     *
     * @param string $item_id
     * @return $this
     */
    public function remove_item($item_id): static {
        if (isset($this->items[$item_id])) {
            $this->items[$item_id]['item']->remove_from_parent();
            unset($this->items[$item_id]);
        }
        return $this;
    }
}
