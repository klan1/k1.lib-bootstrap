<?php

namespace k1lib\html\bootstrap\component;

/**
 * Bootstrap 5 Grid Row component
 *
 * A single row within a Bootstrap grid. Represents a horizontal container
 * that holds grid cells (columns). Uses Bootstrap's row class with
 * configurable column count.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/layout/grid.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */

use k1lib\html\div;
use k1lib\html\bootstrap\component\grid_cell;

class grid_row extends div {

    use bootstrap_methods;

    /**
     * Array of grid_cell instances indexed by column number
     * @var grid_cell[]
     */
    protected $cols;

    /**
     * Number of columns in this row
     * @var int
     */
    protected int $num_cols;

    /**
     * Creates a new Grid Row instance
     *
     * @param int $num_cols Number of cells/columns to create in this row
     * @param int|null $grid_row Optional row number identifier
     * @param \k1lib\html\tag|null $parent Optional parent element to append to
     */
    function __construct($num_cols, $grid_row = NULL, $parent = NULL) {
        $this->parent = $parent;

        parent::__construct("row row-cols-{$num_cols}", NULL);
        if (!empty($this->parent)) {
            $this->append_to($this->parent);
        }

        for ($col = 1; $col <= $num_cols; $col++) {
            $this->cols[$col] = $this->append_cell($col);
        }
    }

    /**
     * Copies CSS classes from one column to all columns in the row
     *
     * @param int $from Column number to copy classes from
     */
    public function copy_clases_to_cols($from) {
        $classes = $this->col($from)->get_attribute('class');
        for ($col = 1; $col <= count($this->cols); $col++) {
            $this->cols[$col]->set_class($classes);
        }
    }

    /**
     * Gets a column by its column number
     *
     * @param int $col_number The 1-based column number
     * @return grid_cell The grid cell at the specified position
     */
    public function col($col_number): grid_cell {
        return $this->cell($col_number);
    }

    /**
     * Gets a cell by its column number (alias for col())
     *
     * @param int $col_number The 1-based column number
     * @return grid_cell|null The grid cell or null if not found
     */
    public function cell($col_number): grid_cell {
        if (isset($this->cols[$col_number])) {
            return $this->cols[$col_number];
        }
    }

    /**
     * Appends a new cell to the row
     *
     * @param int|null $col_number Column number identifier
     * @param string|null $class CSS class for the cell (defaults to 'col')
     * @param string|null $id Optional ID for the cell
     * @return grid_cell The newly created grid cell
     */
    public function append_cell($col_number = NULL, $class = NULL, $id = NULL) {
        $cell = new grid_cell($col_number, $class, $id);
        $cell->append_to($this);
        return $cell;
    }
}