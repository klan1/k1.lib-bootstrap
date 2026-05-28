<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Spinner component
 *
 * An animated loading indicator to show pending states. Supports two
 * visual styles (border and grow), all Bootstrap color variants, and
 * three size options.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/spinners.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class spinner extends \k1lib\html\div {

    /**
     * Border spinner type (traditional circular spinner)
     */
    const TYPE_BORDER = 'border';

    /**
     * Grow spinner type (fading dot spinner)
     */
    const TYPE_GROW = 'grow';

    /**
     * Small size variant
     */
    const SIZE_SM = 'sm';

    /**
     * Medium size variant (default)
     */
    const SIZE_MD = 'md';

    /**
     * Large size variant
     */
    const SIZE_LG = 'lg';

    /**
     * Creates a new Spinner instance
     *
     * @param string $type Spinner visual style: TYPE_BORDER or TYPE_GROW
     * @param string $color Bootstrap color variant (primary, secondary, success, danger, warning, info, light, dark)
     * @param string $size Size: SIZE_SM, SIZE_MD, or SIZE_LG
     * @param bool $centered Wrap in a centered flexbox container
     */
    public function __construct($type = 'border', $color = 'primary', $size = 'md', $centered = FALSE) {
        $size_class = '';
        if ($size === 'sm') {
            $size_class = 'spinner-' . $type . '-sm';
        }
        $class = trim("spinner-{$type} {$size_class} text-{$color}");
        parent::__construct($class, NULL);
        $this->set_attrib('role', 'status');
        $visuallyHidden = new \k1lib\html\span('visually-hidden');
        $visuallyHidden->set_value('Loading...');
        $this->append_child($visuallyHidden);

        if ($centered) {
            $wrapper = new \k1lib\html\div('d-flex justify-content-center align-items-center');
            $wrapper->append_child($this);
            return;
        }
    }
}