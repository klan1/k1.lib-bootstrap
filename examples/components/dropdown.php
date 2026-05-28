<?php
$component_name = 'Dropdown';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Dropdown</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\dropdown &rarr; src/klan1/html/bootstrap/dropdown.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $dropdown = new \k1lib\html\bootstrap\components\dropdown('Actions', [
            ['text' => 'Action', 'href' => '#'],
            ['text' => 'Another Action', 'href' => '#'],
            ['divider' => true],
            ['text' => 'Separated Link', 'href' => '#']
        ]);
        echo $dropdown->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$dropdown</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\dropdown(<span class="textsuccess">'Actions'</span>, [
    [<span class="textsuccess">'text'</span> => <span class="textsuccess">'Action'</span>, <span class="textsuccess">'href'</span> => <span class="textsuccess">'#'</span>],
    [<span class="textsuccess">'text'</span> => <span class="textsuccess">'Another Action'</span>, <span class="textsuccess">'href'</span> => <span class="textsuccess">'#'</span>],
    [<span class="textsuccess">'divider'</span> => <span class="textinfo">true</span>],
    [<span class="textsuccess">'text'</span> => <span class="textsuccess">'Separated Link'</span>, <span class="textsuccess">'href'</span> => <span class="textsuccess">'#'</span>]
]);
<span class="text-warning">echo</span> <span class="textwarning">$dropdown</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
