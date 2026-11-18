<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Close Button component
 *
 * A small, cross-shaped button used to dismiss components such as alerts,
 * toasts, modals and offcanvas panels. It is a reusable building block for
 * other Bootstrap components.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/close-button.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class close_button extends \k1lib\html\button {
    use bootstrap_assets;

    /**
     * Creates a new Close Button instance
     *
     * @param string $dismiss Bootstrap dismiss target (alert, toast, modal, offcanvas)
     * @param bool $white Use the white variant for dark backgrounds
     */
    public function __construct($dismiss = 'alert', $white = FALSE) {
        self::require_assets();
        parent::__construct(NULL, 'btn-close' . ($white ? ' btn-close-white' : ''), NULL, 'button');
        $this->set_attrib('data-bs-dismiss', $dismiss);
        $this->set_attrib('aria-label', 'Close');
    }

    /**
     * Sets the disabled attribute
     *
     * @param bool $disabled Whether the button is disabled
     * @return $this For method chaining
     */
    public function set_disabled($disabled = TRUE) {
        if ($disabled) {
            $this->set_attrib('disabled', 'disabled');
        } else {
            $this->remove_attrib('disabled');
        }
        return $this;
    }
}
