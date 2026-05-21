<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 List Group component
 *
 * Flexible component for displaying a series of content.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/list-group.mdx
 * @license Apache-2.0
 * @version BETA
 */
class list_group extends \k1lib\html\ul {

    /**
     * @param array $items Array of ['text' => '', 'href' => '', 'active' => bool, 'disabled' => bool]
     * @param bool $flush Remove borders and rounded corners
     */
    public function __construct($items = [], $flush = FALSE) {
        $class = $flush ? 'list-group list-group-flush' : 'list-group';
        parent::__construct($class, NULL);

        foreach ($items as $item) {
            $li = $this->append_li();
            $li->set_class('list-group-item');

            if (!empty($item['active'])) {
                $li->set_class('active', TRUE);
            }
            if (!empty($item['disabled'])) {
                $li->set_class('disabled', TRUE);
            }

            if (!empty($item['href'])) {
                $a = $li->append_a($item['href'], $item['text'] ?? '');
                $a->set_class('list-group-item-action');
                if (!empty($item['active'])) {
                    $a->set_class('active', TRUE);
                    $a->set_attrib('aria-current', 'true');
                }
                if (!empty($item['disabled'])) {
                    $a->set_attrib('tabindex', '-1');
                    $a->set_attrib('aria-disabled', 'true');
                    $a->set_class('disabled', TRUE);
                }
            } else {
                $li->set_value($item['text'] ?? '');
            }
        }
    }
}