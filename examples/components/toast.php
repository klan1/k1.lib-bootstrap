<?php
$component_name = 'Toast';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Toast</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\toast &rarr; src/klan1/html/bootstrap/toast.php</div>

    <div class="preview-label">Basic Toast</div>
    <div class="preview-box">
        <?php
        $toast = new \k1lib\html\bootstrap\components\toast('Toast Title', 'This is a toast message.', 'primary');
        echo $toast->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$toast</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\toast(
    <span class="text-success">'Title'</span>,
    <span class="text-success">'Message'</span>,
    <span class="text-success">'primary'</span>
);
<span class="text-warning">echo</span> <span class="text-warning">$toast</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
