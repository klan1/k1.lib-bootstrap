<?php
$component_name = 'Progress';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Progress</h2>
    <div class="component-ref">\k1lib\html\bootstrap\progress &rarr; src/klan1/html/bootstrap/progress.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $prog = new progress([
            ['value' => 25, 'type' => 'primary'],
            ['value' => 50, 'type' => 'success', 'striped' => true],
            ['value' => 75, 'type' => 'warning', 'animated' => true],
            ['value' => 100, 'type' => 'danger']
        ], 20);
        echo $prog->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$prog</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\progress([
    [<span class="text-success">'value'</span> => <span class="text-info">25</span>, <span class="textsuccess">'type'</span> => <span class="textsuccess">'primary'</span>],
    [<span class="textsuccess">'value'</span> => <span class="textinfo">50</span>, <span class="textsuccess">'type'</span> => <span class="textsuccess">'success'</span>, <span class="textsuccess">'striped'</span> => <span class="textinfo">true</span>],
    [<span class="textsuccess">'value'</span> => <span class="textinfo">75</span>, <span class="textsuccess">'type'</span> => <span class="textsuccess">'warning'</span>, <span class="textsuccess">'animated'</span> => <span class="textinfo">true</span>],
], <span class="textinfo">20</span>);
<span class="text-warning">echo</span> <span class="text-warning">$prog</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
