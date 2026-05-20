<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Button Group component
 *
 * Groups a series of buttons together on a single line or stack them vertically.
 * Buttons should follow the Bootstrap button specification.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/button-group.mdx
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/buttons.mdx
 * @license Apache-2.0
 * @version BETA
 */
class button_group extends \k1lib\html\div {

    /**
     * @param array $buttons Array of button HTML objects
     * @param string $size Size (sm, md, lg)
     * @param bool $vertical Stack vertically
     * @param string $label Accessibility label
     */
    public function __construct($buttons = [], $size = 'md', $vertical = FALSE, $label = 'Button group') {
        $size_class = $size !== 'md' ? "btn-group-{$size}" : 'btn-group';
        $class = $vertical ? "btn-group-vertical {$size_class}" : $size_class;
        parent::__construct($class, NULL);
        $this->set_attrib('role', 'group');
        $this->set_attrib('aria-label', $label);

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