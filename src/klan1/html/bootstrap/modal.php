<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Modal component
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/modal.mdx
 * @license Apache-2.0
 */
class modal extends \k1lib\html\div {

    const SIZE_SM = 'modal-sm';
    const SIZE_LG = 'modal-lg';
    const SIZE_XL = 'modal-xl';
    const SIZE_FULLSMALL = 'modal-fullscreen-sm';
    const SIZE_FULLMD = 'modal-fullscreen-md';
    const SIZE_FULLLG = 'modal-fullscreen-lg';
    const SIZE_FULLXL = 'modal-fullscreen-xl';
    const SIZE_FULL = 'modal-fullscreen';

    protected $dialog = NULL;
    protected $content = NULL;
    protected $header = NULL;
    protected $body = NULL;
    protected $footer = NULL;
    protected $title = NULL;
    protected $close_btn = NULL;

    /**
     * @param string $title Modal title text
     * @param string $content Modal body content
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