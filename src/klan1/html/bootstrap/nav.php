<?php

namespace k1\lib\html\bootstrap;

/**
 * Bootstrap 5 Nav component
 *
 * Base nav component for creating navigation bars and tabbed interfaces.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class nav extends \k1lib\html\ul {

    /**
     * @param array $items Array of ['text' => '', 'href' => '', 'active' => bool]
     * @param string $type Nav type (tabs, pills, underline, justified)
     */
    public function __construct($items = [], $type = 'tabs') {
        parent::__construct('nav nav-' . $type, NULL);

        foreach ($items as $item) {
            $li = $this->append_li('nav-item');
            $a = $li->append_a($item['href'] ?? '#', $item['text'] ?? '');
            $a->set_class('nav-link');
            if (!empty($item['active'])) {
                $a->set_class('active', TRUE);
                $a->set_attrib('aria-current', 'page');
            }
        }
    }
}