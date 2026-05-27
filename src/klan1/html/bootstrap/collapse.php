<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Collapse component
 *
 * A collapsible content area that can be shown or hidden via smooth
 * accordion-style transitions. Used in conjunction with buttons or links
 * that trigger the show/hide behavior via Bootstrap's collapse JavaScript.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/collapse.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class collapse extends \k1lib\html\div {

    /**
     * Creates a new Collapse instance
     *
     * @param string $id Unique identifier for this collapse element
     * @param \k1lib\html\tag|null $trigger Button or link element that triggers the collapse.
     *        If provided, the trigger will be configured with data-bs-toggle="collapse".
     * @param string $content HTML content to display in the collapsible area
     * @param bool $expanded Start in expanded (visible) state
     */
    public function __construct($id, $trigger = NULL, $content = '', $expanded = FALSE) {
        parent::__construct('collapse', "collapse-{$id}");

        if ($trigger instanceof \k1lib\html\tag) {
            $trigger->set_attrib('data-bs-toggle', 'collapse');
            $trigger->set_attrib('data-bs-target', "#collapse-{$id}");
            $trigger->set_attrib('aria-expanded', $expanded ? 'true' : 'false');
        }

        $this->set_value($content);
        $this->set_attrib('aria-labelledby', "collapse-{$id}-trigger");
    }
}