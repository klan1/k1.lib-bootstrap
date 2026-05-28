<?php
$component_name = 'Collapse';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Collapse</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\collapse &rarr; src/klan1/html/bootstrap/collapse.php</div>

    <div class="preview-label">Button Trigger</div>
    <div class="preview-box">
        <?php
        $trigger = new \k1lib\html\bootstrap\components\button('Toggle Content', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY);
        $collapse_content = '<p>This is collapsible content that can be shown or hidden.</p>';
        $collapse = new \k1lib\html\bootstrap\components\collapse('demo', $trigger, $collapse_content);
        echo $trigger->generate() . ' ';
        echo $collapse->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$trigger</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\button(<span class="text-success">'Toggle'</span>, \k1lib\html\bootstrap\\k1lib\html\bootstrap\components\button::<span class="text-light">VARIANT_PRIMARY</span>);
<span class="text-warning">$collapse</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\collapse(<span class="textsuccess">'demo'</span>, <span class="text-warning">$trigger</span>, <span class="textsuccess">'<p>Content</p>'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$collapse</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
