<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * This is the main object that will hold all the HTML document.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 *
 * <html lang="en">
 *   <head>
 *     <meta charset="utf-8">
 *     <meta name="viewport" content="width=device-width, initial-scale=1">
 *     <title></title>
 *   </head>
 *   <body>
 *   </body>
 * </html>
 */
class html_document extends tag {

    use append_shotcuts;

    /**
     * @var head
     */
    protected head $head;

    /**
     * @var body
     */
    protected body $body;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string|null
     */
    protected $charset;

    /**
     * @var string|null
     */
    protected $viewport;

    /**
     * @param string $lang Document language (e.g., "en")
     * @param bool $use_custom_head True to skip creating a default <head>
     * @param bool $use_custom_body True to skip creating a default <body>
     */
    function __construct($lang = "en", $use_custom_head = false, $use_custom_body = false) {
        parent::__construct("html", IS_NOT_SELF_CLOSED);

        parent::$root = $this;

        $this->pre_code("<!DOCTYPE html>\n");

        $this->set_lang($lang);

        if (!$use_custom_head) {
            $this->head = new head();
            $this->append_child($this->head);
        }
        if (!$use_custom_body) {
            $this->body = new body();
            $this->append_child($this->body);
        }
    }

    public function set_lang(string $lang): html_document {
        $this->lang = $lang;
        $this->set_attrib("lang", $this->lang);
        return $this;
    }

    public function get_lang(): string {
        return $this->lang;
    }

    /**
     * Shortcut to inject a charset meta tag into <head>.
     *
     * @param string $charset Defaults to utf-8
     * @return html_document
     */
    public function set_charset(string $charset = "utf-8"): html_document {
        $this->charset = $charset;
        $meta = new meta("charset", $charset);
        $meta->set_attrib("charset", $charset);
        $this->head()->append_child_head($meta);
        return $this;
    }

    public function get_charset(): ?string {
        return $this->charset;
    }

    /**
     * Shortcut to inject a viewport meta tag into <head>.
     *
     * @param string $content Defaults to width=device-width, initial-scale=1
     * @return html_document
     */
    public function set_viewport(string $content = "width=device-width, initial-scale=1"): html_document {
        $this->viewport = $content;
        $meta = new meta("viewport", $content);
        $meta->set_attrib("name", "viewport");
        $meta->set_attrib("content", $content);
        $this->head()->append_child_head($meta);
        return $this;
    }

    public function get_viewport(): ?string {
        return $this->viewport;
    }

    /**
     * Generate the HTML document.
     * Ensures charset and viewport defaults are set before rendering.
     *
     * @return string
     */
    public function generate($with_childs = \TRUE, $n_childs = 0): string {
        if (empty($this->charset)) {
            $this->set_charset("utf-8");
        }
        if (empty($this->viewport)) {
            $this->set_viewport("width=device-width, initial-scale=1");
        }
        return parent::generate($with_childs, $n_childs);
    }

    /**
     * @return head
     */
    function head(): head {
        return $this->head;
    }

    /**
     * @return body
     */
    function body(): body {
        return $this->body;
    }
}
