<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Table from Data component
 *
 * A dynamic table component that generates Bootstrap-styled tables from
 * array data. Supports striped rows, hover states, header detection,
 * field hiding, text truncation, float rounding, and template field
 * substitution with {{field:NAME}} and {{field-raw:NAME}} placeholders.
 * Can insert HTML tag objects into specific fields.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/tables.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */

use k1lib\html\table;
use k1lib\html\tag;
use k1lib\K1MAGIC;

class table_from_data extends table {

    /**
     * Default rounding precision for float values (class-wide)
     * @var int|null
     */
    static public $float_round_default = NULL;

    use bootstrap_methods;

    /**
     * Data array for table generation
     * @var array
     */
    protected $data = [];

    /**
     * Original data array (preserved for field parsing)
     * @var array
     */
    protected $data_original = [];

    /**
     * Fields to exclude from table output
     * @var array
     */
    protected $fields_to_hide = [];

    /**
     * Fields used to generate unique auth codes
     * @var array
     */
    protected $fields_for_key_array_text = [];

    /**
     * Whether first row should be treated as headers
     * @var bool
     */
    protected $has_header = TRUE;

    /**
     * Maximum character length for cell text before truncation
     * @var int|null
     */
    protected $max_text_length_on_cell = NULL;

    /**
     * Decimal places to round float values
     * @var int|null
     */
    protected $float_round = NULL;

    /**
     * Creates a new Table from Data instance
     *
     * @param string $class Bootstrap table classes (default: 'table table-striped table-hover mb-0')
     * @param string $id Table element ID
     */
    function __construct($class = "table table-striped table-hover mb-0", $id = "") {
        parent::__construct($class, $id);
        $this->set_class($class);
        $this->set_id($id);

        $this->float_round = self::$float_round_default;
    }

    /**
     * Sets the data array for table generation
     *
     * @param array $data Array of rows, each row being an associative array
     * @param bool $has_header Treat first row as column headers
     * @return $this For method chaining
     */
    public function set_data(array $data, $has_header = TRUE) {
        $this->data = $data;
        $this->data_original = $data;
        $this->has_header = $has_header;
        return $this;
    }

    /**
     * Generates the table HTML
     *
     * @param bool $with_childs Include child elements
     * @param int $n_childs Number of children limit (0 = all)
     * @return string The rendered HTML
     */
    public function generate($with_childs = TRUE, $n_childs = 0) {
        $this->use_data();
        return parent::generate($with_childs, $n_childs);
    }

    /**
     * Sets fields to hide from table output
     *
     * @param array $fields Array of field names to hide
     */
    public function set_fields_to_hide($fields) {
        $this->fields_to_hide = $fields;
    }

    /**
     * Processes data and builds table structure
     */
    public function use_data() {
        $num_col = 0;
        $num_row = 0;
        $row = 0;
        foreach ($this->data as $row_index => $row_data) {
            if ($this->has_header && ($row_index === 0)) {
                $thead = $this->append_thead();
                $tr = $thead->append_tr('table-dark');
            } else {
                $num_row++;
                if (!isset($tbody)) {
                    $tbody = $this->append_tbody();
                }
                $tr = $tbody->append_tr();
            }
            foreach ($row_data as $field => $col_value) {
                if ($this->has_header && $row !== 0) {
                    $col_value = $this->parse_string_value($col_value, $row);
                }
                if (array_search($field, $this->fields_to_hide) !== FALSE) {
                    continue;
                }
                if ($this->has_header && ($row_index === 0)) {
                    $tr->append_th($col_value);
                } else {
                    if (!is_object($col_value)) {
                        if (!empty($col_value)) {
                            if (($this->float_round !== NULL) && is_numeric($col_value) && is_float($col_value + 0)) {
                                $col_value = round($col_value + 0, $this->float_round);
                            } else {
                                if (is_numeric($this->max_text_length_on_cell) && strlen($col_value) > $this->max_text_length_on_cell) {
                                    $col_value = substr($col_value, 0, $this->max_text_length_on_cell) . "...";
                                }
                            }
                        }
                    } else {
                        if (is_numeric($this->max_text_length_on_cell) && strlen($col_value->get_value()) > $this->max_text_length_on_cell) {
                            $col_value->set_value(substr($col_value->get_value(), 0, $this->max_text_length_on_cell) . "...");
                        }
                    }
                    $last_td = $tr->append_td($col_value);
                }
            }
            $row++;
        }
        return $this;
    }

    /**
     * Gets fields used for auth code generation
     *
     * @return array The field names
     */
    public function get_fields_for_key_array_text() {
        return $this->fields_for_key_array_text;
    }

    /**
     * Sets fields used to generate unique auth codes
     *
     * @param array $fields_for_key_array_text Field names to include in auth code
     */
    public function set_fields_for_key_array_text(array $fields_for_key_array_text) {
        $this->fields_for_key_array_text = $fields_for_key_array_text;
    }

    /**
     * Inserts an HTML tag object into specified fields for each row
     *
     * @param tag $tag_object Tag to insert
     * @param array $fields_to_insert Field names where tag should be inserted
     * @param string|null $tag_attrib_to_use Attribute name to use for field value
     * @param bool $append Append to existing content instead of replacing
     * @param bool $respect_blanks Skip blank fields
     * @param bool $just_replace_attribs Only replace attributes, not content
     * @param int|null $just_this_row Only process specific row index
     * @return $this For method chaining
     */
    public function insert_tag_on_field(tag $tag_object, array $fields_to_insert, $tag_attrib_to_use = NULL, $append = FALSE, $respect_blanks = FALSE, $just_replace_attribs = FALSE, $just_this_row = NULL) {
        $row = 0;
        foreach ($this->data_original as $row_index => $row_data) {
            $row++;
            if ($just_this_row !== NULL && $just_this_row != $row_index) {
                continue;
            }
            if ($this->has_header && $row == 1) {
                continue;
            }
            $col = 0;
            foreach ($row_data as $field => $col_value) {
                $col++;
                if (empty($this->data_original[$row_index][$field]) && $respect_blanks) {
                    continue;
                }
                if (array_search($field, $this->fields_to_hide) !== FALSE) {
                    continue;
                }
                if (array_search($field, $fields_to_insert) !== FALSE) {
                    if (!$just_replace_attribs) {
                        $tag_object_copy = clone $tag_object;
                    } else {
                        $tag_object_copy = $tag_object;
                    }

                    if (empty($tag_attrib_to_use)) {
                        if (empty($tag_object_copy->get_value())) {
                            $tag_object_childs = $tag_object_copy->get_childs();
                            if (!empty($tag_object_childs)) {
                                foreach ($tag_object_childs as $child_key => $tag_object_child) {
                                    $tag_object_child_copy = clone $tag_object_child;
                                    $this->insert_tag_on_field($tag_object_child_copy, $fields_to_insert, $tag_attrib_to_use, $append, $respect_blanks, TRUE, $row_index);
                                    $tag_object_copy->replace_child($child_key, $tag_object_child_copy);
                                }
                            } else {
                                $tag_object_copy->set_value($this->parse_string_value($col_value, $row_index));
                            }
                        } else {
                            $tag_object_copy->set_value($this->parse_string_value($tag_object_copy->get_value(), $row_index));
                        }
                    } else {
                        $tag_object_copy->set_attrib($tag_attrib_to_use, $this->parse_string_value($col_value, $row_index));
                    }
                    foreach ($tag_object_copy->get_attributes_array() as $attribute => $value) {
                        if ($attribute == $tag_attrib_to_use) {
                            continue;
                        }
                        $tag_object_copy->set_attrib($attribute, $this->parse_string_value($value, $row_index));
                    }
                    if (!$just_replace_attribs) {
                        $this->data[$row_index][$field] = $tag_object_copy;
                    }
                }
            }
            if ($just_this_row !== NULL && $just_this_row == $row_index) {
                break;
            }
        }
        return $this;
    }

    /**
     * Parses template placeholders in string values
     *
     * Supports {{field:NAME}} (URL-encoded) and {{field-raw:NAME}} (raw),
     * plus --authcode-- placeholder replacement.
     *
     * @param string $value String value to parse
     * @param int $row Row index for data lookup
     * @return string Parsed value
     */
    protected function parse_string_value($value, $row) {
        foreach ($this->get_fields_on_string($value) as $field) {
            if (array_key_exists($field, $this->data_original[$row])) {
                $key_array = [];
                foreach ($this->fields_for_key_array_text as $field_for_key_array_text) {
                    $key_array[] = $this->data_original[$row][$field_for_key_array_text];
                }
                $key_array_text = implode("--", $key_array);
                if (!empty($key_array_text)) {
                    $auth_code = md5(K1MAGIC::get_value() . $key_array_text);
                } else {
                    $auth_code = NULL;
                }
                if (strstr($value, "--authcode--") !== FALSE) {
                    $value = str_replace("--authcode--", $auth_code, $value);
                }
                $field_tag = "{{field:" . $field . "}}";
                $value = str_replace($field_tag, rawurlencode($this->data_original[$row][$field] ?? ''), $value);
            }
        }
        foreach ($this->get_raw_fields_on_string($value) as $field) {
            if (array_key_exists($field, $this->data_original[$row])) {
                $key_array = [];
                foreach ($this->fields_for_key_array_text as $field_for_key_array_text) {
                    $key_array[] = $this->data_original[$row][$field_for_key_array_text];
                }
                $key_array_text = implode("--", $key_array);
                if (!empty($key_array_text)) {
                    $auth_code = md5(K1MAGIC::get_value() . $key_array_text);
                } else {
                    $auth_code = NULL;
                }
                if (strstr($value, "--authcode--") !== FALSE) {
                    $value = str_replace("--authcode--", $auth_code, $value);
                }
                $field_tag = "{{field-raw:" . $field . "}}";
                $value = str_replace($field_tag, $this->data_original[$row][$field] ?? '', $value);
            }
        }
        return $value;
    }

    /**
     * Extracts {{field:NAME}} placeholder field names from a string
     *
     * @param string|null $value String to search
     * @return array Array of field names found
     */
    protected function get_fields_on_string(null|string $value): array {
        if (!empty($value)) {
            $pattern = "/{{field:(\w+)}}/";
            $matches = [];
            $fields = [];
            if (preg_match_all($pattern, $value, $matches)) {
                foreach ($matches[1] as $field) {
                    $fields[] = $field;
                }
            }
            return $fields;
        } else {
            return [];
        }
    }

    /**
     * Extracts {{field-raw:NAME}} placeholder field names from a string
     *
     * @param string $value String to search
     * @return array Array of field names found
     */
    protected function get_raw_fields_on_string($value) {
        if (!empty($value)) {
            $pattern = "/{{field-raw:(\w+)}}/";
            $matches = [];
            $fields = [];
            if (preg_match_all($pattern, $value, $matches)) {
                foreach ($matches[1] as $field) {
                    $fields[] = $field;
                }
            }
            return $fields;
        } else {
            return [];
        }
    }

    /**
     * Hides specified fields from table output
     *
     * @param array $fields Array of field names to hide
     * @return $this For method chaining
     */
    public function hide_fields(array $fields) {
        $this->fields_to_hide = $fields;
        return $this;
    }

    /**
     * Checks if table has a header row
     *
     * @return bool TRUE if first row is treated as header
     */
    public function has_header() {
        return $this->has_header;
    }

    /**
     * Gets maximum text length for cell truncation
     *
     * @return int|null The max length or null if no limit
     */
    public function get_max_text_length_on_cell() {
        return $this->max_text_length_on_cell;
    }

    /**
     * Sets maximum text length for cell truncation
     *
     * @param int|null $max_text_length_on_cell Max characters before truncation
     * @return $this For method chaining
     */
    public function set_max_text_length_on_cell($max_text_length_on_cell) {
        $this->max_text_length_on_cell = $max_text_length_on_cell;
        return $this;
    }

    /**
     * Sets decimal places to round float values
     *
     * @param int $round_places Number of decimal places
     */
    public function set_float_round($round_places) {
        $this->float_round = $round_places;
    }

    /**
     * Gets current float rounding setting
     *
     * @return int|null Number of decimal places or null
     */
    public function get_float_round() {
        return $this->float_round;
    }
}