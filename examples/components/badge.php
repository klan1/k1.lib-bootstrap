<?php
$component_name = 'Badge';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Badge</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\badge &rarr; src/klan1/html/bootstrap/badge.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box badge-demo">
        <?php
        echo (new \k1lib\html\bootstrap\components\badge('Primary'))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Secondary', 'secondary'))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Success', 'success'))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Danger', 'danger'))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Warning', 'warning'))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Info', 'info'))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Light', 'light'))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Dark', 'dark'))->generate();
        ?>
    </div>

    <div class="preview-label">Pill Badges</div>
    <div class="preview-box badge-demo">
        <?php
        echo (new \k1lib\html\bootstrap\components\badge('Primary', 'primary', true))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Secondary', 'secondary', true))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Success', 'success', true))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\badge('Danger', 'danger', true))->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic badges</span>
<span class="text-warning">echo</span> (<span class="text-info">new</span> \k1lib\html\bootstrap\components\badge(<span class="text-success">'Primary'</span>))-><span class="text-light">generate</span>() . <span class="text-success">' '</span>;
<span class="text-warning">echo</span> (<span class="text-info">new</span> \k1lib\html\bootstrap\components\badge(<span class="text-success">'Secondary'</span>, <span class="text-success">'secondary'</span>))-><span class="text-light">generate</span>();

<span class="text-primary">// Pill badge</span>
<span class="text-warning">echo</span> (<span class="text-info">new</span> \k1lib\html\bootstrap\components\badge(<span class="text-success">'Pill'</span>, <span class="text-success">'primary'</span>, <span class="text-info">true</span>))-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
