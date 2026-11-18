<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Validation feedback component
 *
 * Renders the `.valid-feedback`, `.invalid-feedback`, `.valid-tooltip` or
 * `.invalid-tooltip` message used with Bootstrap form validation.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/forms/validation.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class validation extends \k1lib\html\div {
    use bootstrap_assets;

    /**
     * Feedback type: valid or invalid
     * @var string
     */
    protected $type = 'valid';

    /**
     * Whether to render as tooltip instead of feedback
     * @var bool
     */
    protected $as_tooltip = FALSE;

    /**
     * Creates a new Validation feedback instance
     *
     * @param string $message Feedback text
     * @param string $type valid or invalid
     * @param bool $as_tooltip Render as tooltip instead of feedback
     */
    public function __construct($message = '', $type = 'valid', $as_tooltip = FALSE) {
        self::require_assets();
        $this->type = ($type === 'invalid') ? 'invalid' : 'valid';
        $this->as_tooltip = $as_tooltip;
        parent::__construct($this->build_class(), NULL);
        $this->set_value($message);
    }

    /**
     * Builds the Bootstrap feedback class from type and tooltip flag
     *
     * @return string The CSS class
     */
    protected function build_class() {
        return $this->type . ($this->as_tooltip ? '-tooltip' : '-feedback');
    }

    /**
     * Sets the feedback message
     *
     * @param string $message Feedback text
     * @return $this For method chaining
     */
    public function set_message($message) {
        $this->set_value($message);
        return $this;
    }

    /**
     * Sets the feedback type
     *
     * @param string $type valid or invalid
     * @return $this For method chaining
     */
    public function set_type($type) {
        $this->type = ($type === 'invalid') ? 'invalid' : 'valid';
        $this->set_class($this->build_class(), FALSE);
        return $this;
    }

    /**
     * Toggles tooltip rendering
     *
     * @param bool $as_tooltip Whether to render as tooltip
     * @return $this For method chaining
     */
    public function set_as_tooltip($as_tooltip = TRUE) {
        $this->as_tooltip = $as_tooltip;
        $this->set_class($this->build_class(), FALSE);
        return $this;
    }
}
