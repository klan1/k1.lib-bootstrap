<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Card component
 *
 * Flexible and extensible content container with multiple variants and options.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class card extends \k1lib\html\div {

    protected $header = NULL;
    protected $body = NULL;
    protected $footer = NULL;

    /**
     * @param string $title Card title
     * @param string $subtitle Optional card subtitle
     * @param string $text Card body text
     */
    public function __construct($title = NULL, $subtitle = NULL, $text = NULL) {
        parent::__construct('card', NULL);

        $this->header = new \k1lib\html\div('card-header');
        $this->body = new \k1lib\html\div('card-body');
        $this->footer = new \k1lib\html\div('card-footer');

        $this->append_child($this->header);
        $this->append_child($this->body);
        $this->append_child($this->footer);

        if ($title) {
            $this->body->append_h5($title, 'card-title');
        }
        if ($subtitle) {
            $this->body->append_h6($subtitle, 'card-subtitle mb-2 text-muted');
        }
        if ($text) {
            $this->body->append_p($text, 'card-text');
        }
    }

    /**
     * @return \k1lib\html\div
     */
    public function header() {
        return $this->header;
    }

    /**
     * @return \k1lib\html\div
     */
    public function body() {
        return $this->body;
    }

    /**
     * @return \k1lib\html\div
     */
    public function footer() {
        return $this->footer;
    }
}