<?php

namespace k1\lib\html\bootstrap;

/**
 * Bootstrap 5 Carousel component
 *
 * Slideshow component for cycling through elements (images, text, etc.).
 *
 * @author  Alejandro Trujillo J. (J0hnd03)
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 * @version BETA
 */
class carousel extends \k1lib\html\div {

    protected $slides = [];
    protected $indicators = NULL;
    protected $controls = NULL;

    /**
     * @param array $slides Array of slide data ['image' => '', 'caption' => '', 'active' => bool]
     * @param bool $indicators Show slide indicators
     * @param bool $controls Show prev/next controls
     * @param bool $autoplay Enable auto-sliding
     */
    public function __construct($slides = [], $indicators = TRUE, $controls = TRUE, $autoplay = FALSE) {
        parent::__construct('carousel slide', 'mainCarousel');
        $this->set_attrib('data-bs-ride', $autoplay ? 'carousel' : 'false');

        $inner = new \k1lib\html\div('carousel-inner');

        foreach ($slides as $index => $slide) {
            $item = new \k1lib\html\div('carousel-item');
            if (!empty($slide['active'])) {
                $item->set_class('active', TRUE);
            }
            if (!empty($slide['image'])) {
                $img = new \k1lib\html\img($slide['image'], NULL);
                $img->set_attrib('alt', $slide['caption'] ?? '');
                $item->append_child($img);
            }
            if (!empty($slide['caption'])) {
                $caption = new \k1lib\html\div('carousel-caption');
                $caption->append_h5($slide['caption']);
                $item->append_child($caption);
            }
            $inner->append_child($item);
        }

        $this->append_child($inner);
    }
}