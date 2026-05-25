<?php

/**
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */

namespace k1lib\html;

/**
 * Static Class that holds the first tag Object <html></html>.
 * This is a helper to have a global access to the HTML page is been
 * generated, developer could use or not.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 */
class DOM {

    /**
     * @var html_document
     */
    static protected html_document|null $html_document = null;

    static function start(html_document $html_document): html_document {

        self::$html_document = $html_document;

        return self::$html_document;
    }

    static function is_started() {
        if (!empty(self::$html_document)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * @return html_document
     */
    static function html(): html_document {
        return self::$html_document;
    }

    static function generate() {
        return self::$html_document->generate();
    }
}
