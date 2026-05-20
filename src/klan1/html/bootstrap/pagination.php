<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Pagination component
 *
 * Indicate that a series of related content exists across multiple pages.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/pagination.mdx
 * @license Apache-2.0
 * @version BETA
 */
class pagination extends \k1lib\html\ul {

    /**
     * @param int $current_page Current active page
     * @param int $total_pages Total number of pages
     * @param string $base_url URL prefix for page links
     * @param bool $show_prev_next Show previous/next buttons
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