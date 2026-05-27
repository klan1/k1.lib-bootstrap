<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Breadcrumb component
 *
 * Displays a hierarchical trail of navigation links showing the user's
 * current location within the site structure. Automatically applies
 * Bootstrap's breadcrumb styling with separators between items.
 * The last item is marked as active (current page) if no href is provided.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/breadcrumb.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class breadcrumb extends \k1lib\html\nav {

    /**
     * Ordered list container for breadcrumb items
     * @var \k1lib\html\ol
     */
    private $ol;

    /**
     * Creates a new Breadcrumb instance
     */
    public function __construct() {
        parent::__construct('', NULL);
        $this->set_attrib('aria-label', 'breadcrumb');

        $this->ol = new \k1lib\html\ol('breadcrumb');
        $this->append_child($this->ol);
    }

    /**
     * Adds a new breadcrumb item
     *
     * @param string $text The display text for this breadcrumb item
     * @param string|null $href Optional URL for the item link. If NULL,
     *                          the item is marked as the current page (active)
     * @return $this For method chaining
     */
    public function add_item($text, $href = NULL) {
        $li = $this->ol->append_li(null, 'breadcrumb-item');

        if ($href !== NULL) {
            $li->append_a($href, $text);
        } else {
            $li->set_value($text);
            $li->set_class('active', TRUE);
            $li->set_attrib('aria-current', 'page');
        }
        return $this;
    }

    /**
     * Retrieves a breadcrumb item by its position
     *
     * @param int $index Zero-based index of the breadcrumb item
     * @return \k1lib\html\li|null The breadcrumb list item or NULL if not found
     */
    public function item($index) {
        $childs = $this->ol->get_childs();
        return $childs[$index] ?? NULL;
    }

    /**
     * Returns the total count of breadcrumb items
     *
     * @return int Number of items in the breadcrumb trail
     */
    public function count() {
        return count($this->ol->get_childs());
    }

    /**
     * Removes a breadcrumb item at the specified index
     *
     * @param int $index Zero-based index of the item to remove
     * @return $this For method chaining
     */
    public function remove_item($index) {
        $this->ol->remove_child($index);
        return $this;
    }
}