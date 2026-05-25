<?php
$component_name = 'Offcanvas';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Offcanvas</h2>
    <div class="component-ref">\k1lib\html\bootstrap\offcanvas &rarr; src/klan1/html/bootstrap/offcanvas.php</div>

    <div class="preview-label">Basic (Start/Left)</div>
    <div class="preview-box">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasStart" aria-controls="offcanvasStart">
            Open Offcanvas (Left)
        </button>
        <?php
        $offcanvas_left = new \k1lib\html\bootstrap\offcanvas('start', 'Offcanvas Title', '<p>Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.</p><hr><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>');
        echo $offcanvas_left->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$offcanvas</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\offcanvas(<span class="textsuccess">'start'</span>, <span class="textsuccess">'Title'</span>, <span class="textsuccess">'<p>Content</p>'</span>);
<span class="textwarning">echo</span> <span class="textwarning">$offcanvas</span>-><span class="textlight">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">End (Right)</div>
    <div class="preview-box">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
            Open Offcanvas (Right)
        </button>
        <?php
        $offcanvas_right = new \k1lib\html\bootstrap\offcanvas('end', 'Right Offcanvas', '<p>This offcanvas slides in from the right side.</p>');
        echo $offcanvas_right->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$offcanvas</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\offcanvas(<span class="textsuccess">'end'</span>, <span class="textsuccess">'Title'</span>, <span class="textsuccess">'<p>Content</p>'</span>);</code></pre>
    </div>

    <div class="preview-label mt-4">Top</div>
    <div class="preview-box">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
            Open Offcanvas (Top)
        </button>
        <?php
        $offcanvas_top = new \k1lib\html\bootstrap\offcanvas('top', 'Top Offcanvas', '<p>This offcanvas slides in from the top.</p>');
        echo $offcanvas_top->generate();
        ?>
    </div>

    <div class="preview-label mt-4">Bottom</div>
    <div class="preview-box">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
            Open Offcanvas (Bottom)
        </button>
        <?php
        $offcanvas_bottom = new \k1lib\html\bootstrap\offcanvas('bottom', 'Bottom Offcanvas', '<p>This offcanvas slides in from the bottom.</p>');
        echo $offcanvas_bottom->generate();
        ?>
    </div>
</section>

</div></body></html>