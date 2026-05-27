<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Grid component
 *
 * A grid container that creates a Bootstrap grid layout with rows and cells.
 * Provides a structured layout system based on the 12-column grid system.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/layout/grid.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class grid extends \k1lib\html\div {

    use bootstrap_methods;

    /**
     * Array of grid_row instances
     * @var grid_row[]
     */
    protected $rows = [];

    /**
     * Number of rows in the grid
     * @var int
     */
    protected $num_rows;

    /**
     * Number of columns per row
     * @var int
     */
    protected $num_cols;

    /**
     * Creates a new Grid instance
     *
     * @param int $num_rows Number of rows to create
     * @param int $num_cols Number of columns per row
     * @param \k1lib\html\tag|null $parent Optional parent element to attach to
     */
    public function __construct($num_rows, $num_cols, \k1lib\html\tag $parent = NULL) {
        $this->parent = $parent;

        $this->num_rows = 0;
        $this->num_cols = $num_cols;

        if (empty($this->parent)) {
            parent::__construct();
            for ($row = 1; $row <= $num_rows; $row++) {
                $this->append_row($num_cols, $row, $this);
            }
        } else {
            $this->link_value_obj($parent);
            for ($row = 1; $row <= $num_rows; $row++) {
                $this->append_row($num_cols, $row, $this->parent);
            }
            return $parent;
        }
    }

    /**
     * Gets a row by its row number
     *
     * @param int $row_number The 1-based row number to retrieve
     * @return \k1lib\html\bootstrap\grid_row|null The grid row or null if not found
     */
    public function row($row_number) {
        if (isset($this->rows[$row_number])) {
            return $this->rows[$row_number];
        }
    }

    /**
     * Appends a new row to the grid
     *
     * @param int|null $num_cols Number of cells in the row (defaults to grid's num_cols)
     * @param int|null $grid_row Row number identifier
     * @param \k1lib\html\tag|null $parent Parent element to append to
     * @return \k1lib\html\bootstrap\grid_row The newly created row
     */
    public function append_row($num_cols = NULL, $grid_row = NULL, $parent = NULL) {
        if ($num_cols === NULL) {
            $num_cols = $this->num_cols;
        }
        $row = new grid_row($num_cols, $grid_row, $parent);
        $this->rows[++$this->num_rows] = $row;
        return $row;
    }
}