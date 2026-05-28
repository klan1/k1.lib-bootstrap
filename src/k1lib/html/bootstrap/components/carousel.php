<?php

namespace k1lib\html\bootstrap\components;

/**
 * Bootstrap 5 Carousel component
 *
 * A slideshow component for cycling through elements (images or text slides)
 * with support for indicators, controls, autoplay, crossfade effects, and
 * touch/swipe navigation.
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link    https://github.com/klan1/k1.lib-bootstrap
 * @link    https://github.com/twbs/bootstrap/blob/v5.3.8/site/src/content/docs/components/carousel.mdx
 * @license Apache-2.0
 * @version 1.0.0
 */
class carousel extends \k1lib\html\div {

    /**
     * Array of slide data
     * @var array
     */
    protected $slides = [];

    /**
     * Creates a new Carousel instance
     *
     * @param array $slides Array of slide data. Each slide can have:
     *   - 'image' (string): URL of the slide image
     *   - 'caption' (string): Slide caption title
     *   - 'text' (string): Additional caption text
     *   - 'active' (bool): Set as the initially active slide
     *   - 'interval' (int): Custom interval for this slide in milliseconds
     * @param bool $indicators Show slide indicator buttons at the bottom
     * @param bool $controls Show previous/next navigation arrows
     * @param bool $autoplay Enable automatic sliding
     * @param array $options Additional options:
     *   - 'crossfade' (bool): Enable crossfade transition effect
     *   - 'dark' (bool): Use dark variant styling
     *   - 'touch' (bool): Enable touch/swipe navigation
     *   - 'interval' (int): Default interval between slides in milliseconds
     */
    public function __construct($slides = [], $indicators = TRUE, $controls = TRUE, $autoplay = FALSE, $options = []) {
        if (!is_array($options)) {
            $options = [];
        }
        $options = array_merge([
            'crossfade' => FALSE,
            'dark' => FALSE,
            'touch' => TRUE,
            'interval' => 5000,
        ], $options);

        $classes = 'carousel slide';
        if ($options['crossfade']) {
            $classes .= ' carousel-fade';
        }
        if ($options['dark']) {
            $classes .= ' carousel-dark';
        }

        parent::__construct($classes, 'mainCarousel');

        if ($autoplay) {
            $this->set_attrib('data-bs-ride', 'carousel');
            if ($options['interval']) {
                $this->set_attrib('data-bs-interval', $options['interval']);
            }
        } else {
            $this->set_attrib('data-bs-ride', 'false');
        }

        if (!$options['touch']) {
            $this->set_attrib('data-bs-touch', 'false');
        }

        $this->set_attrib('tabindex', '0');

        if ($indicators) {
            $indicatorsDiv = new \k1lib\html\div('carousel-indicators');
            foreach ($slides as $index => $slide) {
                $indicatorBtn = new \k1lib\html\button();
                if (!empty($slide['active'])) {
                    $indicatorBtn->set_class('active', TRUE);
                }
                $indicatorBtn->set_attrib('type', 'button');
                $indicatorBtn->set_attrib('data-bs-target', '#mainCarousel');
                $indicatorBtn->set_attrib('data-bs-slide-to', $index);
                if ($index === 0) {
                    $indicatorBtn->set_attrib('aria-current', 'true');
                }
                $indicatorBtn->set_attrib('aria-label', 'Slide ' . ($index + 1));
                $indicatorsDiv->append_child($indicatorBtn);
            }
            $this->append_child($indicatorsDiv);
        }

        $inner = new \k1lib\html\div('carousel-inner');

        foreach ($slides as $index => $slide) {
            $item = new \k1lib\html\div('carousel-item');
            if (!empty($slide['active'])) {
                $item->set_class('active', TRUE);
            }
            if (!empty($slide['interval'])) {
                $item->set_attrib('data-bs-interval', $slide['interval']);
            }
            if (!empty($slide['image'])) {
                $img = new \k1lib\html\img($slide['image']);
                $img->set_class('d-block w-100');
                $img->set_attrib('alt', $slide['caption'] ?? '');
                $item->append_child($img);
            }
            if (!empty($slide['caption'])) {
                $caption = new \k1lib\html\div('carousel-caption d-none d-md-block');
                $caption_h5 = $caption->append_h5($slide['caption']);
                if (!empty($slide['text'])) {
                    $caption->append_p($slide['text']);
                }
                $item->append_child($caption);
            }
            $inner->append_child($item);
        }

        $this->append_child($inner);

        if ($controls) {
            $prevBtn = new \k1lib\html\button();
            $prevBtn->set_class('carousel-control-prev');
            $prevBtn->set_attrib('type', 'button');
            $prevBtn->set_attrib('data-bs-target', '#mainCarousel');
            $prevBtn->set_attrib('data-bs-slide', 'prev');
            $prevIcon = new \k1lib\html\span('carousel-control-prev-icon');
            $prevIcon->set_attrib('aria-hidden', 'true');
            $prevBtn->append_child($prevIcon);
            $prevLabel = new \k1lib\html\span('visually-hidden');
            $prevLabel->set_value('Previous');
            $prevBtn->append_child($prevLabel);

            $nextBtn = new \k1lib\html\button();
            $nextBtn->set_class('carousel-control-next');
            $nextBtn->set_attrib('type', 'button');
            $nextBtn->set_attrib('data-bs-target', '#mainCarousel');
            $nextBtn->set_attrib('data-bs-slide', 'next');
            $nextIcon = new \k1lib\html\span('carousel-control-next-icon');
            $nextIcon->set_attrib('aria-hidden', 'true');
            $nextBtn->append_child($nextIcon);
            $nextLabel = new \k1lib\html\span('visually-hidden');
            $nextLabel->set_value('Next');
            $nextBtn->append_child($nextLabel);

            $this->append_child($prevBtn);
            $this->append_child($nextBtn);
        }
    }
}