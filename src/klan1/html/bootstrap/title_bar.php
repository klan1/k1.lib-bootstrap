<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Title Bar component
 *
 * A specialized bar component for page titles. Includes a menu button
 * on the left and a title span, commonly used in mobile-friendly
 * interfaces or as part of larger navigation structures.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version 1.0.0
 */
class title_bar extends bar {

    /**
     * Left side menu button
     * @var \k1lib\html\button
     */
    protected $left_button = null;

    /**
     * Title text span
     * @var \k1lib\html\span
     */
    protected $title = null;

    /**
     * Creates a new Title Bar instance
     *
     * @param string|null $id Optional element ID
     */
    function __construct($id = NULL) {
        parent::__construct('title', $id);
        $this->left_button = new \k1lib\html\button(NULL, "menu-icon");
        $this->left_button->append_to($this->left);

        $this->title = new \k1lib\html\span("title-bar-title");
        $this->title->append_to($this->left);
    }

    /**
     * Gets the title span element for customization
     *
     * @return \k1lib\html\span The title element
     */
    public function title() {
        return $this->title;
    }

    /**
     * Gets the left menu button for customization
     *
     * @return \k1lib\html\button The left button element
     */
    public function left_button() {
        return $this->left_button;
    }
}