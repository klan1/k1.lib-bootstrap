<?php
$component_name = 'Carousel';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Carousel</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\carousel &rarr; src/klan1/html/bootstrap/carousel.php</div>

    <div class="preview-label">With Indicators and Controls</div>
    <div class="preview-box">
        <?php
        $slides = [
            [
                'image' => 'https://picsum.photos/id/1018/800/400',
                'caption' => 'Mountain Landscape',
                'text' => 'Beautiful mountain scenery',
                'active' => true
            ],
            [
                'image' => 'https://picsum.photos/id/1015/800/400',
                'caption' => 'River Canyon',
                'text' => 'The flowing river cuts through',
                'active' => false
            ],
            [
                'image' => 'https://picsum.photos/id/1019/800/400',
                'caption' => 'Ocean View',
                'text' => 'Endless ocean horizon',
                'active' => false
            ]
        ];
        $carousel = new \k1lib\html\bootstrap\components\carousel($slides, true, true, false);
        echo $carousel->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$slides</span> = [
    [
        <span class="text-success">'image'</span> => <span class="text-success">'https://picsum.photos/id/1018/800/400'</span>,
        <span class="text-success">'caption'</span> => <span class="text-success">'Mountain Landscape'</span>,
        <span class="text-success">'text'</span> => <span class="textsuccess">'Description text'</span>,
        <span class="textsuccess">'active'</span> => <span class="textinfo">true</span>
    ],
    [<span class="textsuccess">'image'</span> => <span class="textsuccess">'...'</span>, <span class="textsuccess">'caption'</span> => <span class="textsuccess">'...'</span>],
];
<span class="textwarning">$carousel</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\components\carousel(<span class="textwarning">$slides</span>, <span class="textinfo">true</span>, <span class="textinfo">true</span>, <span class="textinfo">false</span>);
<span class="textwarning">echo</span> <span class="textwarning">$carousel</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Autoplay</div>
    <div class="preview-box">
        <?php
        $autoplaySlides = [
            [
                'image' => 'https://picsum.photos/id/1020/800/400',
                'caption' => 'Forest Path',
                'active' => true
            ],
            [
                'image' => 'https://picsum.photos/id/1021/800/400',
                'caption' => 'Desert Dunes',
                'active' => false
            ]
        ];
        $autoplayCarousel = new \k1lib\html\bootstrap\components\carousel($autoplaySlides, true, true, true);
        echo $autoplayCarousel->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textcomment">// Autoplay enabled (data-bs-ride="carousel")</span>
<span class="textwarning">$carousel</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\components\carousel(<span class="textwarning">$slides</span>, <span class="textinfo">true</span>, <span class="textinfo">true</span>, <span class="textinfo">true</span>);</code></pre>
    </div>

    <div class="preview-label mt-4">Crossfade</div>
    <div class="preview-box">
        <?php
        $crossfadeCarousel = new \k1lib\html\bootstrap\components\carousel($slides, true, true, false, ['crossfade' => true]);
        echo $crossfadeCarousel->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$carousel</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\components\carousel(<span class="textwarning">$slides</span>, <span class="textinfo">true</span>, <span class="textinfo">true</span>, <span class="textinfo">false</span>, [<span class="textsuccess">'crossfade'</span> => <span class="textinfo">true</span>]);</code></pre>
    </div>

    <div class="preview-label mt-4">Individual Interval</div>
    <div class="preview-box">
        <?php
        $intervalSlides = [
            [
                'image' => 'https://picsum.photos/id/1032/800/400',
                'caption' => 'First Slide',
                'text' => 'Stays longer',
                'active' => true,
                'interval' => 10000
            ],
            [
                'image' => 'https://picsum.photos/id/1035/800/400',
                'caption' => 'Second Slide',
                'text' => 'Changes faster',
                'active' => false,
                'interval' => 2000
            ],
            [
                'image' => 'https://picsum.photos/id/1036/800/400',
                'caption' => 'Third Slide',
                'active' => false
            ]
        ];
        $intervalCarousel = new \k1lib\html\bootstrap\components\carousel($intervalSlides, true, true, true);
        echo $intervalCarousel->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$slides</span> = [
    [
        <span class="textsuccess">'image'</span> => <span class="textsuccess">'...'</span>,
        <span class="textsuccess">'interval'</span> => <span class="textinfo">10000</span>,  <span class="text-secondary">// 10 seconds</span>
    ],
    [
        <span class="textsuccess">'interval'</span> => <span class="textinfo">2000</span>,   <span class="text-secondary">// 2 seconds</span>
    ],
];</code></pre>
    </div>

    <div class="preview-label mt-4">No Controls</div>
    <div class="preview-box">
        <?php
        $noControlsCarousel = new \k1lib\html\bootstrap\components\carousel($slides, false, false, false);
        echo $noControlsCarousel->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$carousel</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\components\carousel(<span class="textwarning">$slides</span>, <span class="textinfo">false</span>, <span class="textinfo">false</span>, <span class="textinfo">false</span>);</code></pre>
    </div>
</section>

</div></body></html>