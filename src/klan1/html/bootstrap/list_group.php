<?php

namespace k1lib\html\bootstrap;

class list_group extends \k1lib\html\ul {

    protected $flush = FALSE;

    public function __construct($items = [], $flush = FALSE) {
        $this->flush = $flush;
        $class = 'list-group';
        if ($flush) {
            $class .= ' list-group-flush';
        }
        parent::__construct($class, NULL);

        if (!empty($items)) {
            $this->add_items($items);
        }
    }

    public function add_item($text = '', $href = NULL, $active = FALSE, $disabled = FALSE, $variant = NULL) {
        if ($href !== NULL) {
            $a = new \k1lib\html\a($href, $text);
            $a->set_class('list-group-item list-group-item-action');
            if ($active) {
                $a->set_class('active', TRUE);
                $a->set_attrib('aria-current', 'true');
            }
            if ($disabled) {
                $a->set_class('disabled', TRUE);
                $a->set_attrib('tabindex', '-1');
                $a->set_attrib('aria-disabled', 'true');
            }
            if ($variant) {
                $a->set_class("list-group-item-{$variant}", TRUE);
            }
            $this->append_child($a);
            return $a;
        } else {
            $li = $this->append_li();
            $li->set_class('list-group-item');
            if ($active) {
                $li->set_class('active', TRUE);
                $li->set_attrib('aria-current', 'true');
            }
            if ($disabled) {
                $li->set_class('disabled', TRUE);
            }
            if ($variant) {
                $li->set_class("list-group-item-{$variant}", TRUE);
            }
            $li->set_value($text);
            return $li;
        }
    }

    public function add_items(array $items) {
        foreach ($items as $item) {
            $text = $item['text'] ?? '';
            $href = $item['href'] ?? NULL;
            $active = $item['active'] ?? FALSE;
            $disabled = $item['disabled'] ?? FALSE;
            $variant = $item['variant'] ?? NULL;
            $this->add_item($text, $href, $active, $disabled, $variant);
        }
        return $this;
    }
}
