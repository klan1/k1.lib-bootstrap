<?php
$component_name = 'Grid';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Grid</h2>
    <div class="component-ref">\k1lib\html\bootstrap\grid &rarr; src/klan1/html/bootstrap/grid.php</div>

    <div class="preview-label">Basic Grid</div>
    <div class="preview-box">
        <?php
        $demo_grid = new grid(2, 3);
        $row1 = $demo_grid->row(1);
        $row1->general(4)->small(6)->medium(4);
        $row1->get_child(0)->set_value('Row 1, Col 1');
        $row1->get_child(1)->set_value('Row 1, Col 2');
        $row1->get_child(2)->set_value('Row 1, Col 3');

        $row2 = $demo_grid->row(2);
        $row2->general(4)->small(6)->medium(4);
        $row2->get_child(0)->set_value('Row 2, Col 1');
        $row2->get_child(1)->set_value('Row 2, Col 2');
        $row2->get_child(2)->set_value('Row 2, Col 3');

        echo $demo_grid->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$grid</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\grid(<span class="text-info">2</span>, <span class="text-info">3</span>);
<span class="text-warning">$row1</span> = <span class="textwarning">$grid</span>-><span class="textlight">row</span>(<span class="text-info">1</span>);
<span class="text-warning">$row1</span>-><span class="textlight">general</span>(<span class="text-info">4</span>)-><span class="textlight">small</span>(<span class="text-info">6</span>);
<span class="text-warning">$row1</span>-><span class="textlight">get_child</span>(<span class="text-info">0</span>)-><span class="textlight">set_value</span>(<span class="text-success">'Col 1'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$grid</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
