<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Button Group component
 *
 * Groups a series of buttons together on a single line or stack them vertically.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class button_group extends \k1lib\html\div {

    /**
     * @param array $buttons Array of button HTML objects
     * @param string $size Size (sm, md, lg)
     * @param bool $vertical Stack vertically
     */
    public function __construct($buttons = [], $size = 'md', $vertical = FALSE) {
        $size_class = $size !== 'md' ? "btn-group-{$size}" : 'btn-group';
        $class = $vertical ? "btn-group-vertical {$size_class}" : $size_class;
        parent::__construct($class, NULL);

        foreach ($buttons as $button) {
            $this->append_child($button);
        }
    }

    /**
     * @param \k1lib\html\tag $button
     * @return $this
     */
    public function add_button($button) {
        $this->append_child($button);
        return $this;
    }
}