<?php

namespace k1lib\html\bootstrap;

/**
 * Bootstrap 5 Navbar component
 *
 * Responsive navigation header with brand, links, and collapse functionality.
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/k1lib/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/navbar.mdx
 * @license Apache-2.0
 * @version BETA
 */
class navbar extends \k1lib\html\nav {

    protected $brand = NULL;
    protected $collapse = NULL;

    /**
     * @param string $brand Brand text or HTML
     * @param string $id Unique navbar identifier
     * @param string $color Background color (light, dark, custom)
     * @param string $expand Breakpoint for mobile collapse (sm, md, lg, xl, xxl)
     */
    public function __construct($brand = '', $id = 'mainNavbar', $color = 'light', $expand = 'lg') {
        parent::__construct('navbar navbar-expand-' . $expand . ' navbar-' . $color, $id);
        $this->set_attrib('data-bs-theme', $color === 'dark' ? 'dark' : 'light');

        if (!empty($brand)) {
            $this->brand = new \k1lib\html\a('#', $brand, 'navbar-brand');
            $this->append_child($this->brand);
        }

        $this->collapse = new \k1lib\html\div('collapse navbar-collapse');
        $this->append_child($this->collapse);
    }

    /**
     * @return \k1lib\html\div
     */
    public function collapse() {
        return $this->collapse;
    }

    /**
     * @param \k1lib\html\tag $content
     * @return $this
     */
    public function add_to_collapse($content) {
        $this->collapse->append_child($content);
        return $this;
    }
}