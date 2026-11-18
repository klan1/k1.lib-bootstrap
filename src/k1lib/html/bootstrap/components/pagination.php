<?php

namespace k1lib\html\bootstrap\components;

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
    use bootstrap_assets;

    use bootstrap_methods;

    /**
     * Creates a new Pagination instance
     *
     * @param int $current_page The currently active page number
     * @param int $total_pages Total number of available pages
     * @param string $base_url Base URL for page links (query param ?page=X will be appended)
     * @param bool $show_prev_next Show Previous and Next navigation links
     */
    public function __construct($current_page = 1, $total_pages = 1, $base_url = '', $show_prev_next = TRUE) {
        self::require_assets();
        parent::__construct('pagination', NULL);

        if ($show_prev_next) {
            $prev = $this->append_li();
            $prev->set_class('page-item' . ($current_page > 1 ? '' : ' disabled'));
            $prev_label = $current_page > 1 ? "&laquo;" : "<span aria-hidden='true'>&laquo;</span>";
            $prev_href = $current_page > 1 ? "{$base_url}?page=" . ($current_page - 1) : '#';
            $prev_a = $prev->append_a($prev_href, $prev_label);
            $prev_a->set_class('page-link');
            if ($current_page <= 1) {
                $prev_a->set_attrib('tabindex', '-1');
                $prev_a->set_attrib('aria-disabled', 'true');
            }
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            $li = $this->append_li();
            $li->set_class('page-item' . ($i === $current_page ? ' active' : ''));
            $page_a = $li->append_a("{$base_url}?page={$i}", $i);
            $page_a->set_class('page-link');
            if ($i === $current_page) {
                $li->append_span('visually-hidden')->set_value('(current)');
            }
        }

        if ($show_prev_next) {
            $next = $this->append_li();
            $next->set_class('page-item' . ($current_page < $total_pages ? '' : ' disabled'));
            $next_label = $current_page < $total_pages ? "&raquo;" : "<span aria-hidden='true'>&raquo;</span>";
            $next_href = $current_page < $total_pages ? "{$base_url}?page=" . ($current_page + 1) : '#';
            $next_a = $next->append_a($next_href, $next_label);
            $next_a->set_class('page-link');
            if ($current_page >= $total_pages) {
                $next_a->set_attrib('tabindex', '-1');
                $next_a->set_attrib('aria-disabled', 'true');
            }
        }
    }

    /**
     * Sets the Bootstrap sizing class
     *
     * @param string $size lg or sm (empty clears the sizing class)
     * @return $this For method chaining
     */
    public function set_size($size) {
        $this->remove_attribute_text('class', 'pagination-lg');
        $this->remove_attribute_text('class', 'pagination-sm');
        if ($size === 'lg' || $size === 'sm') {
            $this->set_class('pagination-' . $size, TRUE);
        }
        return $this;
    }

    /**
     * Sets the horizontal alignment
     *
     * @param string $alignment center or end (empty clears the alignment)
     * @return $this For method chaining
     */
    public function set_alignment($alignment) {
        $this->remove_attribute_text('class', 'justify-content-center');
        $this->remove_attribute_text('class', 'justify-content-end');
        if ($alignment === 'center' || $alignment === 'end') {
            $this->set_class('justify-content-' . $alignment, TRUE);
        }
        return $this;
    }
}
