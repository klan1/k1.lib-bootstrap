<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Grid Cell component
 *
 * A single cell (column) within a Bootstrap grid row. Represents a
 * responsive column that can contain content and can be nested with
 * additional grids or rows.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/layout/grid.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */

use k1lib\html\div;

class grid_cell extends div {

    use bootstrap_methods;

    /**
     * Row number this cell belongs to
     * @var int
     */
    protected $row_number = 0;

    /**
     * Creates a new Grid Cell instance
     *
     * @param int|null $col_number Column number identifier
     * @param string $class CSS class for the cell (defaults to 'col' for auto-sizing)
     * @param string|null $id Optional element ID
     */
    public function __construct($col_number = NULL, $class = 'col', $id = NULL) {
        parent::__construct($class, NULL);
    }

    /**
     * Sets CSS classes with append mode by default
     *
     * @param string $class CSS class name(s)
     * @param bool $append Whether to append or replace (default TRUE)
     * @return $this For method chaining
     */
    public function set_class($class, $append = TRUE) {
        parent::set_class($class, $append);
        return $this;
    }

    /**
     * Appends a nested grid to this cell
     *
     * @param int $num_rows Number of rows in the nested grid
     * @param int $num_cols Number of columns per row in the nested grid
     * @return grid The newly created nested grid
     */
    public function append_grid($num_rows, $num_cols) {
        $grid = new grid($num_rows, $num_cols, $this);
        return $grid;
    }

    /**
     * Appends a nested row to this cell
     *
     * @param int $num_cols Number of cells in the nested row
     * @return grid_row The newly created nested row
     */
    public function append_row($num_cols) {
        $row = new grid_row($num_cols, ++$this->row_number, $this);
        return $row;
    }
}