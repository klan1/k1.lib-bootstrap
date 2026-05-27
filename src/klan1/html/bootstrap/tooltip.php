<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Tooltip component
 *
 * A small popup that appears when the user hovers over an element,
 * providing additional information. Tooltips can be positioned
 * above, below, to the left, or to the right of the target element.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/tooltip.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class tooltip extends \k1lib\html\span {

    /**
     * Position tooltip above the element
     */
    const PLACEMENT_TOP = 'top';

    /**
     * Position tooltip below the element
     */
    const PLACEMENT_BOTTOM = 'bottom';

    /**
     * Position tooltip to the left of the element
     */
    const PLACEMENT_LEFT = 'left';

    /**
     * Position tooltip to the right of the element
     */
    const PLACEMENT_RIGHT = 'right';

    /**
     * Creates a new Tooltip instance
     *
     * @param \k1lib\html\tag $target The element to attach the tooltip to
     * @param string $text Tooltip text content
     * @param string $placement Position: PLACEMENT_TOP, PLACEMENT_BOTTOM, PLACEMENT_LEFT, or PLACEMENT_RIGHT
     * @param bool $html Allow HTML content in the tooltip text
     */
    public function __construct($target, $text, $placement = 'top', $html = FALSE) {
        parent::__construct('', NULL);

        $target->set_attrib('data-bs-toggle', 'tooltip');
        $target->set_attrib('data-bs-placement', $placement);
        $target->set_attrib('title', $text);

        if ($html) {
            $target->set_attrib('data-bs-html', 'true');
        }
    }
}