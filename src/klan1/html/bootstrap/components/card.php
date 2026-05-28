<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Card component
 *
 * A flexible and extensible content container that includes a header,
 * body, and footer. Cards support almost any kind of content and can
 * include images, lists, links, and more.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/card.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class card extends \k1lib\html\div {

    /**
     * Card header element
     * @var \k1lib\html\div|null
     */
    protected $header = NULL;

    /**
     * Card body element (main content area)
     * @var \k1lib\html\div|null
     */
    protected $body = NULL;

    /**
     * Card footer element
     * @var \k1lib\html\div|null
     */
    protected $footer = NULL;

    /**
     * Creates a new Card instance
     *
     * @param string|null $title Card title text (h5 element)
     * @param string|null $subtitle Card subtitle text (h6 element)
     * @param string|null $text Card body text (paragraph element)
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
     * Sets the card header
     *
     * @param string $content Header HTML content
     * @return $this For method chaining
     */
    public function set_header($content) {
        $this->header = new \k1lib\html\div('card-header');
        $this->header->set_value($content);
        $this->append_child($this->header);
        $this->append_child($this->body);
        return $this;
    }

    /**
     * Sets the card footer
     *
     * @param string $content Footer HTML content
     * @return $this For method chaining
     */
    public function set_footer($content) {
        $this->footer = new \k1lib\html\div('card-footer');
        $this->footer->set_value($content);
        $this->append_child($this->footer);
        return $this;
    }

    /**
     * Gets the card body element for adding custom content
     *
     * @return \k1lib\html\div The card body element
     */
    public function body() {
        return $this->body;
    }
}