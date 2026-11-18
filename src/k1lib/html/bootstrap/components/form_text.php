<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Form Text component
 *
 * Help text for form controls using the `.form-text` class.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/form-control.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class form_text extends \k1lib\html\div {
    use bootstrap_assets;

    /**
     * Creates a new Form Text instance
     *
     * @param string $message Help text content
     * @param string|null $id Element id (useful for aria-describedby)
     */
    public function __construct($message = '', $id = NULL) {
        self::require_assets();
        parent::__construct('form-text', $id);
        $this->set_value($message);
    }

    /**
     * Sets the help text content
     *
     * @param string $message Help text content
     * @return $this For method chaining
     */
    public function set_message($message) {
        $this->set_value($message);
        return $this;
    }
}
