<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Collapse component
 *
 * Show/hide content via smooth accordion-style transitions.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/collapse.mdx
 * @license Apache-2.0
 * @version BETA
 */
class collapse extends \k1lib\html\div {

    /**
     * @param string $id Unique collapse identifier
     * @param \k1lib\html\tag $trigger Button or link that triggers the collapse
     * @param string $content Collapsible content HTML
     * @param bool $expanded Start in expanded state
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