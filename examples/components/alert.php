<?php
$component_name = 'Alert';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Alert</h2>
    <div class="component-ref">\k1lib\html\bootstrap\alert &rarr; src/klan1/html/bootstrap/alert.php</div>

    <div class="preview-label">Variants</div>
    <div class="preview-box">
        <?php
        $types = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        foreach ($types as $type) {
            $a = new \k1lib\html\bootstrap\alert("A simple {$type} alert—check it out!", $type, true);
            echo $a->generate();
        }
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$alert</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\alert(
    <span class="text-success">'This is an alert!'</span>,
    <span class="text-success">'primary'</span>,
    <span class="text-info">true</span>  <span class="text-secondary">// dismissible</span>
);
<span class="text-warning">echo</span> <span class="text-warning">$alert</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
