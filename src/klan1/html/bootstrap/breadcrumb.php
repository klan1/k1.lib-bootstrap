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

    /**
     * @param array $items Array of ['text' => '', 'href' => ''] items
     */
    public function __construct($items = []) {
        parent::__construct('', NULL);
        $this->set_attrib('aria-label', 'breadcrumb');

        $ol = new \k1lib\html\ol('breadcrumb');
        $this->append_child($ol);

        foreach ($items as $index => $item) {
            $li = $ol->append_li(null, 'breadcrumb-item');
            $is_last = $index === count($items) - 1;

            if (!empty($item['href']) && !$is_last) {
                $li->append_a($item['href'], $item['text']);
            } else {
                $li->set_value($item['text']);
                $li->set_class('active', TRUE);
                $li->set_attrib('aria-current', 'page');
            }
        }
    }
}