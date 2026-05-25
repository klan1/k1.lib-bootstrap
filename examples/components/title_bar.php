<?php
$component_name = 'Title Bar';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Title Bar</h2>
    <div class="component-ref">\k1lib\html\bootstrap\title_bar &rarr; src/klan1/html/bootstrap/title_bar.php</div>

    <div class="preview-label">Basic Title Bar</div>
    <div class="preview-box">
        <?php
        $titleBar = new \k1lib\html\bootstrap\title_bar();
        $titleBar->set_title('Page Title');
        $titleBar->add_child(new \k1lib\html\bootstrap\button('Action', \k1lib\html\bootstrap\button::VARIANT_PRIMARY));
        echo $titleBar->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$titleBar</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\title_bar();
<span class="text-warning">$titleBar</span>-><span class="textlight">set_title</span>(<span class="textsuccess">'Page Title'</span>);
<span class="text-warning">$titleBar</span>-><span class="textlight">add_child</span>(
    <span class="textinfo">new</span> \k1lib\html\bootstrap\button(<span class="textsuccess">'Action'</span>, \k1lib\html\bootstrap\button::<span class="textlight">VARIANT_PRIMARY</span>)
);
<span class="text-warning">echo</span> <span class="text-warning">$titleBar</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
