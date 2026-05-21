<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Breadcrumb component
 *
 * Indicates the current page's location within a navigational hierarchy.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/breadcrumb.mdx
 * @license Apache-2.0
 * @version BETA
 */
class breadcrumb extends \k1lib\html\nav {

    private $ol;

    public function __construct() {
        parent::__construct('', NULL);
        $this->set_attrib('aria-label', 'breadcrumb');

        $this->ol = new \k1lib\html\ol('breadcrumb');
        $this->append_child($this->ol);
    }

    /**
     * Add a breadcrumb item
     *
     * @param string $text Item text
     * @param string|null $href Item URL (null for current page)
     * @return $this
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
     * Get a breadcrumb item by index
     *
     * @param int $index
     * @return \k1lib\html\li|null
     */
    public function item($index) {
        $childs = $this->ol->get_childs();
        return $childs[$index] ?? NULL;
    }

    /**
     * Get total number of items
     *
     * @return int
     */
    public function count() {
        return count($this->ol->get_childs());
    }

    /**
     * Remove an item by index
     *
     * @param int $index
     * @return $this
     */
    public function remove_item($index) {
        $this->ol->remove_child($index);
        return $this;
    }
}