<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Breadcrumb component
 *
 * Indicates the current page's location within a navigational hierarchy.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class breadcrumb extends \k1lib\html\ol {

    /**
     * @param array $items Array of ['text' => '', 'href' => ''] items
     */
    public function __construct($items = []) {
        parent::__construct('breadcrumb', NULL);
        $this->set_attrib('aria-label', 'breadcrumb');

        foreach ($items as $item) {
            $li = $this->append_li('breadcrumb-item');
            if (!empty($item['href'])) {
                $li->append_a($item['href'], $item['text']);
            } else {
                $li->set_value($item['text']);
                $li->set_attrib('aria-current', 'page');
            }
        }
    }
}