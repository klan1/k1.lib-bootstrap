<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Bar component
 *
 * A base component for creating horizontal bars with left and right
 * sections. Used as a foundation for title_bar, top_bar, and similar
 * components that need a dual-section layout.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version 1.0.0
 */
class bar extends \k1lib\html\div {

    /**
     * Bar type identifier (e.g., 'title', 'top')
     * @var string
     */
    protected $type;

    /**
     * Left section container
     * @var \k1lib\html\div
     */
    protected $left = null;

    /**
     * Right section container
     * @var \k1lib\html\div
     */
    protected $right = null;

    /**
     * Creates a new Bar instance
     *
     * @param string $type Bar type identifier for CSS class naming
     * @param string|null $id Optional element ID
     */
    function __construct($type, $id = NULL) {
        $this->type = $type;
        parent::__construct("{$type}-bar", $id);
        $this->left = new \k1lib\html\div("{$type}-bar-left");
        $this->right = new \k1lib\html\div("{$type}-bar-right");

        $this->left->append_to($this);
        $this->right->append_to($this);
    }

    /**
     * Gets the left section container
     *
     * @return \k1lib\html\div The left section element
     */
    public function left() {
        return $this->left;
    }

    /**
     * Gets the right section container
     *
     * @return \k1lib\html\div The right section element
     */
    public function right() {
        if (empty($this->right)) {
            $this->right = new \k1lib\html\div("{$this->type}-bar-right");
        }
        return $this->right;
    }
}