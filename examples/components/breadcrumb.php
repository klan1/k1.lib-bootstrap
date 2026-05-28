<?php
$component_name = 'Breadcrumb';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Breadcrumb</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\breadcrumb &rarr; src/klan1/html/bootstrap/breadcrumb.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $bread = new \k1lib\html\bootstrap\components\breadcrumb();
        $bread->add_item('Home', '#')
              ->add_item('Library', '#')
              ->add_item('Data', '#')
              ->add_item('Current Page');
        echo $bread->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$bread</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\breadcrumb();
<span class="text-warning">$bread</span>-><span class="text-light">add_item</span>(<span class="text-success">'Home'</span>, <span class="text-success">'#'</span>)
      -><span class="text-light">add_item</span>(<span class="text-success">'Library'</span>, <span class="text-success">'#'</span>)
      -><span class="text-light">add_item</span>(<span class="text-success">'Current Page'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$bread</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
