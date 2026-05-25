<?php
$component_name = 'Callout';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Callout</h2>
    <div class="component-ref">\k1lib\html\bootstrap\callout &rarr; src/klan1/html/bootstrap/callout.php</div>

    <div class="preview-label">Dismissible Callout</div>
    <div class="preview-box">
        <?php
        $callout = new \k1lib\html\bootstrap\callout('This is a dismissible callout message.', 'Callout Title', true, 'primary');
        echo $callout->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$callout</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\callout(
    <span class="text-success">'This is a callout message.'</span>,
    <span class="text-success">'Callout Title'</span>,
    <span class="text-info">true</span>,  <span class="text-secondary">// dismissible</span>
    <span class="textsuccess">'primary'</span>
);
<span class="text-warning">echo</span> <span class="text-warning">$callout</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
