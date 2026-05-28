<?php
$component_name = 'Pagination';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Pagination</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\pagination &rarr; src/klan1/html/bootstrap/pagination.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $pager = new \k1lib\html\bootstrap\components\pagination(3, 10, '/page', true);
        echo $pager->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$pager</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\pagination(<span class="text-info">3</span>, <span class="text-info">10</span>, <span class="textsuccess">'/page'</span>, <span class="textinfo">true</span>);
<span class="text-warning">echo</span> <span class="text-warning">$pager</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
