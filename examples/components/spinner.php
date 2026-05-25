<?php
$component_name = 'Spinner';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Spinner</h2>
    <div class="component-ref">\k1lib\html\bootstrap\spinner &rarr; src/klan1/html/bootstrap/spinner.php</div>

    <div class="preview-label">Border Spinner</div>
    <div class="preview-box">
        <?php
        echo (new \k1lib\html\bootstrap\spinner())->generate();
        ?>
    </div>

    <div class="preview-label">Growing Spinner</div>
    <div class="preview-box">
        <?php
        echo (new \k1lib\html\bootstrap\spinner('grow'))->generate();
        ?>
    </div>

    <div class="preview-label">Colors</div>
    <div class="preview-box">
        <?php
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        foreach ($colors as $color) {
            echo (new \k1lib\html\bootstrap\spinner())->set_color($color)->generate() . ' ';
        }
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Border spinner</span>
<span class="text-warning">$spinner</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\spinner();
<span class="text-warning">echo</span> <span class="text-warning">$spinner</span>-><span class="textlight">generate</span>();

<span class="text-primary">// Growing spinner</span>
<span class="text-warning">$spinner</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\spinner(<span class="textsuccess">'grow'</span>);

<span class="textprimary">// Colored</span>
<span class="textwarning">$spinner</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\spinner();
<span class="textwarning">$spinner</span>-><span class="textlight">set_color</span>(<span class="textsuccess">'primary'</span>);</code></pre>
    </div>
</section>

</div></body></html>
