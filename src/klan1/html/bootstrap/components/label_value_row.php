<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Label Value Row component
 *
 * A responsive row component that displays a label and value pair, commonly
 * used in forms or data display tables. On medium screens the row takes
 * 6 columns, and on small screens it takes full width (12 columns).
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version 1.0.0
 */

use k1lib\html\div;

class label_value_row extends div {

    use bootstrap_methods;

    /**
     * Creates a new Label Value Row instance
     *
     * @param string $label The label text
     * @param mixed $value The value (can be a string or a k1lib HTML tag object)
     */
    public function __construct($label, $value) {
        parent::__construct();
        $this->general(12)->medium(6);

        $form_group = $this->append_div('form-group');

        if (is_object($value) && is_subclass_of($value, 'k1lib\html\tag')) {
            $input_name = $this->get_name_attribute($value);
            $label_tag = new \k1lib\html\label($label, $input_name, "k1lib-label-object k1lib-data-item-label");
            if ($value->get_tag_name() != 'div') {
                $value->set_class('form-control', TRUE);
            }
        } else {
            $label_tag = new \k1lib\html\label($label, null, "k1lib-label-object");
        }
        $form_group->set_value("$label_tag $value");
    }

    /**
     * Extracts the name attribute from a tag object
     *
     * @param \k1lib\html\tag $tag_object Tag to extract name from
     * @return string|null The name attribute value
     */
    private function get_name_attribute($tag_object) {
        if (\method_exists($tag_object, "get_elements_by_tag")) {
            if (!isset($tag_object)) {
                $tag_object = new \k1lib\html\input("input", "dummy", null);
            }
            $elements = $tag_object->get_elements_by_tag("input");
            if (empty($elements)) {
                $elements = $tag_object->get_elements_by_tag("select");
            }
            if (empty($elements)) {
                $elements = $tag_object->get_elements_by_tag("textarea");
            }
            foreach ($elements as $element) {
                $name = $element->get_attribute("name");
                if ($name) {
                    return $name;
                }
            }
        }
        return null;
    }
}