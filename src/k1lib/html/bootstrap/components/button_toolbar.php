<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Button Toolbar component
 *
 * Combines groups of button groups into button toolbars.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/button-group.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class button_toolbar extends \k1lib\html\div {
    use bootstrap_assets;

    /**
     * @param string $label Accessibility label
     */
    public function __construct($label = 'Button toolbar') {
        self::require_assets();
        parent::__construct('btn-toolbar', NULL);
        $this->set_attrib('role', 'toolbar');
        $this->set_attrib('aria-label', $label);
    }

    /**
     * Add a button group to the toolbar
     *
     * @param \k1lib\html\bootstrap\components\button_group $group
     * @param string $class Additional classes like 'me-2' for spacing
     * @return $this
     */
    public function add_group(button_group $group, $class = ''): static {
        if ($class) {
            $group->set_class($class, TRUE);
        }
        $this->append_child($group);
        return $this;
    }
}
