<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Modal component
 *
 * A modal is a dialog box/popup window that displays on top of the current page.
 * It includes a header with a close button, a body with customizable content,
 * and an optional footer with action buttons. Supports sizes, scrollable content,
 * centered positioning, static backdrop, and keyboardDismiss configuration.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/modal.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class modal extends \k1lib\html\div {

    /**
     * Small modal width (max-width: 300px)
     */
    const SIZE_SM = 'modal-sm';

    /**
     * Large modal width (max-width: 800px)
     */
    const SIZE_LG = 'modal-lg';

    /**
     * Extra large modal width (max-width: 1140px)
     */
    const SIZE_XL = 'modal-xl';

    /**
     * Fullscreen below small breakpoint
     */
    const SIZE_FULLSMALL = 'modal-fullscreen-sm';

    /**
     * Fullscreen below medium breakpoint
     */
    const SIZE_FULLMD = 'modal-fullscreen-md';

    /**
     * Fullscreen below large breakpoint
     */
    const SIZE_FULLLG = 'modal-fullscreen-lg';

    /**
     * Fullscreen below extra large breakpoint
     */
    const SIZE_FULLXL = 'modal-fullscreen-xl';

    /**
     * Always fullscreen
     */
    const SIZE_FULL = 'modal-fullscreen';

    /**
     * Dialog container element
     * @var \k1lib\html\div
     */
    protected $dialog = NULL;

    /**
     * Content container element
     * @var \k1lib\html\div
     */
    protected $content = NULL;

    /**
     * Modal header element
     * @var \k1lib\html\div
     */
    protected $header = NULL;

    /**
     * Modal body element
     * @var \k1lib\html\div
     */
    protected $body = NULL;

    /**
     * Modal footer element
     * @var \k1lib\html\div
     */
    protected $footer = NULL;

    /**
     * Modal title element
     * @var \k1lib\html\h1|null
     */
    protected $title = NULL;

    /**
     * Close button element
     * @var \k1lib\html\button|null
     */
    protected $close_btn = NULL;

    /**
     * Creates a new Modal instance
     *
     * @param string $title Modal title text displayed in the header
     * @param string $content Modal body content (HTML supported)
     * @param array $options Configuration array with keys:
     *   - id (string|null): Modal ID, auto-generated if null
     *   - size (string|null): SIZE_SM, SIZE_LG, SIZE_XL, SIZE_FULLSMALL, SIZE_FULLMD, SIZE_FULLLG, SIZE_FULLXL, or SIZE_FULL
     *   - scrollable (bool): Enable scrollable modal body (default: FALSE)
     *   - centered (bool): Center the modal vertically (default: FALSE)
     *   - static_backdrop (bool): Close on backdrop click disabled (default: TRUE)
     *   - keyboard (bool): Enable ESC key to close (default: FALSE)
     *   - btn_ok (string): OK button text, empty to hide (default: 'OK')
     *   - btn_cancel (string): Cancel button text, empty to hide (default: 'Cancel')
     *   - btn_ok_class (string): OK button Bootstrap classes (default: 'btn-primary')
     *   - btn_cancel_class (string): Cancel button Bootstrap classes (default: 'btn-secondary')
     */
    public function __construct($title = '', $content = '', $options = []) {
        if (!is_array($options)) {
            $options = [];
        }
        $options = array_merge([
            'id' => NULL,
            'size' => NULL,
            'scrollable' => FALSE,
            'centered' => FALSE,
            'static_backdrop' => TRUE,
            'keyboard' => FALSE,
            'btn_ok' => 'OK',
            'btn_cancel' => 'Cancel',
            'btn_ok_class' => 'btn-primary',
            'btn_cancel_class' => 'btn-secondary',
        ], $options);

        $id = $options['id'] ?? 'modal-' . uniqid();
        parent::__construct('modal fade', $id);
        $this->set_attrib('tabindex', '-1');
        $this->set_attrib('aria-labelledby', $id . 'Label');

        if ($options['static_backdrop']) {
            $this->set_attrib('data-bs-backdrop', 'static');
        }
        if (!$options['keyboard']) {
            $this->set_attrib('data-bs-keyboard', 'false');
        }

        $dialog_classes = 'modal-dialog';
        if ($options['size']) {
            $dialog_classes .= ' modal-' . $options['size'];
        }
        if ($options['centered']) {
            $dialog_classes .= ' modal-dialog-centered';
        }
        if ($options['scrollable']) {
            $dialog_classes .= ' modal-dialog-scrollable';
        }

        $this->dialog = new \k1lib\html\div($dialog_classes);
        $this->content = new \k1lib\html\div('modal-content');

        $this->header = new \k1lib\html\div('modal-header');

        if (!empty($title)) {
            $this->title = new \k1lib\html\h1(NULL, 'modal-title fs-5');
            $this->title->set_attrib('id', $id . 'Label');
            $this->title->set_value($title);
            $this->header->append_child($this->title);
        }

        $this->close_btn = new \k1lib\html\button();
        $this->close_btn->set_class('btn-close');
        $this->close_btn->set_attrib('type', 'button');
        $this->close_btn->set_attrib('data-bs-dismiss', 'modal');
        $this->close_btn->set_attrib('aria-label', 'Close');
        $this->header->append_child_tail($this->close_btn);

        $this->body = new \k1lib\html\div('modal-body');
        $this->body->set_value($content);

        $this->footer = new \k1lib\html\div('modal-footer');
        if (!empty($options['btn_cancel'])) {
            $btn_cancel = new \k1lib\html\button($options['btn_cancel']);
            $btn_cancel->set_class('btn ' . $options['btn_cancel_class']);
            $btn_cancel->set_attrib('type', 'button');
            $btn_cancel->set_attrib('data-bs-dismiss', 'modal');
            $this->footer->append_child($btn_cancel);
        }
        if (!empty($options['btn_ok'])) {
            $btn_ok = new \k1lib\html\button($options['btn_ok']);
            $btn_ok->set_class('btn ' . $options['btn_ok_class']);
            $btn_ok->set_attrib('type', 'button');
            $this->footer->append_child($btn_ok);
        }

        $this->content->append_child($this->header);
        $this->content->append_child($this->body);
        $this->content->append_child($this->footer);
        $this->dialog->append_child($this->content);
        $this->append_child($this->dialog);
    }

    /**
     * Adds an element or button to the modal footer
     *
     * @param \k1lib\html\tag|string $element Element or text to add to footer.
     *        If a tag object, it will be appended directly. If a string,
     *        a button with that text will be created.
     * @param string $position Position to add the element ('last' only supported)
     * @return $this For method chaining
     */
    public function add_footer_item($element, $position = 'last') {
        if ($element instanceof \k1lib\html\tag) {
            $this->footer->append_child($element);
        } else {
            $btn = new \k1lib\html\button((string) $element);
            $btn->set_class('btn btn-secondary');
            $btn->set_attrib('type', 'button');
            $btn->set_attrib('data-bs-dismiss', 'modal');
            $this->footer->append_child($btn);
        }
        return $this;
    }
}