<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Progress component
 *
 * Display completion progress for tasks with customizable bars.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class progress extends \k1lib\html\div {

    /**
     * @param array $bars Array of ['value' => int, 'type' => '', 'label' => '', 'striped' => bool, 'animated' => bool]
     * @param int $height Height in pixels
     */
    public function __construct($bars = [], $height = NULL) {
        parent::__construct('progress', NULL);

        if ($height) {
            $this->set_attrib('style', "height: {$height}px");
        }

        foreach ($bars as $bar) {
            $bar_div = new \k1lib\html\div('progress-bar');
            $bar_div->set_attrib('role', 'progressbar');
            $bar_div->set_attrib('aria-valuenow', $bar['value'] ?? 0);
            $bar_div->set_attrib('aria-valuemin', 0);
            $bar_div->set_attrib('aria-valuemax', 100);
            $bar_div->set_attrib('style', "width: {$bar['value']}%");

            $type = $bar['type'] ?? '';
            if ($type) {
                $bar_div->set_class("bg-{$type}", TRUE);
            }
            if (!empty($bar['striped'])) {
                $bar_div->set_class('progress-bar-striped', TRUE);
            }
            if (!empty($bar['animated'])) {
                $bar_div->set_class('progress-bar-striped', TRUE);
                $bar_div->set_class('progress-bar-animated', TRUE);
            }

            $this->append_child($bar_div);
        }
    }
}