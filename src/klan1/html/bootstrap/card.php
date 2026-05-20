<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Card component
 *
 * Flexible and extensible content container with multiple variants and options.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/k1lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/card.mdx
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

        $this->body = new \k1lib\html\div('card-body');
        $this->append_child($this->body);

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
     * @param string $content Header content
     * @return $this
     */
    public function set_header($content) {
        $this->header = new \k1lib\html\div('card-header');
        $this->header->set_value($content);
        $this->append_child($this->header);
        $this->append_child($this->body);
        return $this;
    }

    /**
     * @param string $content Footer content
     * @return $this
     */
    public function set_footer($content) {
        $this->footer = new \k1lib\html\div('card-footer');
        $this->footer->set_value($content);
        $this->append_child($this->footer);
        return $this;
    }

    /**
     * @return \k1lib\html\div
     */
    public function body() {
        return $this->body;
    }
}