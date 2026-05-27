<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Progress component
 *
 * Display completion progress for tasks or loading states with support
 * for multiple bars, contextual color variants, striped patterns, and
 * animated stripes.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/k11/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/progress.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class progress extends \k1lib\html\div {

    /**
     * Creates a new Progress instance
     *
     * @param array $bars Array of progress bar configurations. Each bar can have:
     *   - 'value' (int): Progress percentage (0-100)
     *   - 'type' (string): Bootstrap color type (primary, secondary, success, danger, warning, info)
     *   - 'striped' (bool): Apply striped styling
     *   - 'animated' (bool): Apply animated striped styling
     *   - 'label' (string): Text label displayed in the bar
     * @param int|null $height Fixed height in pixels
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