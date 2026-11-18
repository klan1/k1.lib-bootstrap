<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Placeholder component
 *
 * Skeleton placeholder used to show loading states with the `.placeholder`
 * class, column/width spans, contextual backgrounds and sizing.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/placeholder.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class placeholder extends \k1lib\html\span {
    use bootstrap_assets;

    /**
     * Creates a new Placeholder instance
     *
     * @param int|string $cols Bootstrap column span (1-12) or width class (for example w-75)
     * @param string|null $variant Contextual background (primary, secondary, success...)
     * @param string|null $size lg, sm or xs
     */
    public function __construct($cols = 12, $variant = NULL, $size = NULL) {
        self::require_assets();
        parent::__construct('placeholder', NULL);
        $this->set_cols($cols);
        if ($variant !== NULL) {
            $this->set_variant($variant);
        }
        if ($size !== NULL) {
            $this->set_size($size);
        }
    }

    /**
     * Sets the column or width span class
     *
     * @param int|string $cols col-* or w-*
     * @return $this For method chaining
     */
    public function set_cols($cols) {
        $class = preg_replace('/\s*(col|w)-\S+/', '', (string) $this->get_attribute('class'));
        if (is_numeric($cols)) {
            $cols = 'col-' . $cols;
        }
        $this->set_class(trim($class) . ' ' . $cols, FALSE);
        return $this;
    }

    /**
     * Sets the contextual background class
     *
     * @param string $variant Bootstrap color variant
     * @return $this For method chaining
     */
    public function set_variant($variant) {
        $class = preg_replace('/\s*bg-\S+/', '', (string) $this->get_attribute('class'));
        $this->set_class(trim($class) . ' bg-' . $variant, FALSE);
        return $this;
    }

    /**
     * Sets the placeholder sizing class
     *
     * @param string $size lg, sm or xs
     * @return $this For method chaining
     */
    public function set_size($size) {
        $class = preg_replace('/\s*placeholder-(lg|sm|xs)/', '', (string) $this->get_attribute('class'));
        if ($size === 'lg' || $size === 'sm' || $size === 'xs') {
            $size = ' placeholder-' . $size;
        } else {
            $size = '';
        }
        $this->set_class(trim($class) . $size, FALSE);
        return $this;
    }
}
