<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Pagination component
 *
 * A component for navigating between pages of related content, such as
 * search results, article archives, or tabular data. Displays page
 * numbers with Previous/Next navigation controls.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/pagination.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class pagination extends \k1lib\html\ul {

    /**
     * Creates a new Pagination instance
     *
     * @param int $current_page The currently active page number
     * @param int $total_pages Total number of available pages
     * @param string $base_url Base URL for page links (query param ?page=X will be appended)
     * @param bool $show_prev_next Show Previous and Next navigation links
     */
    public function __construct($current_page = 1, $total_pages = 1, $base_url = '', $show_prev_next = TRUE) {
        parent::__construct('pagination', NULL);

        if ($show_prev_next) {
            $prev = $this->append_li();
            $prev->set_class('page-item');
            $prev_label = $current_page > 1 ? "&laquo;" : "<span aria-hidden='true'>&laquo;</span>";
            $prev_class = $current_page > 1 ? '' : 'disabled';
            $prev_href = $current_page > 1 ? "{$base_url}?page=" . ($current_page - 1) : '#';
            $prev->append_a($prev_href, $prev_label, 'page-link ' . $prev_class);
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            $li = $this->append_li();
            $li->set_class('page-item' . ($i === $current_page ? ' active' : ''));
            $li->append_a("{$base_url}?page={$i}", $i, 'page-link');
            if ($i === $current_page) {
                $li->append_span('sr-only')->set_value('(current)');
            }
        }

        if ($show_prev_next) {
            $next = $this->append_li();
            $next->set_class('page-item');
            $next_label = $current_page < $total_pages ? "&raquo;" : "<span aria-hidden='true'>&raquo;</span>";
            $next_class = $current_page < $total_pages ? '' : 'disabled';
            $next_href = $current_page < $total_pages ? "{$base_url}?page=" . ($current_page + 1) : '#';
            $next->append_a($next_href, $next_label, 'page-link ' . $next_class);
        }
    }
}