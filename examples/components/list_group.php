<?php
$component_name = 'List Group';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">List Group</h2>
    <div class="component-ref">\k1lib\html\bootstrap\list_group &rarr; src/klan1/html/bootstrap/list_group.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $list = new list_group([
            ['text' => 'First item', 'href' => '#'],
            ['text' => 'Second item', 'href' => '#', 'active' => true],
            ['text' => 'Third item', 'href' => '#'],
            ['text' => 'Disabled item', 'disabled' => true]
        ]);
        echo $list->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$list</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\list_group([
    [<span class="text-success">'text'</span> => <span class="text-success">'First item'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>],
    [<span class="text-success">'text'</span> => <span class="text-success">'Second'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>, <span class="text-success">'active'</span> => <span class="text-info">true</span>],
    [<span class="text-success">'text'</span> => <span class="text-success">'Third'</span>, <span class="textsuccess">'href'</span> => <span class="textsuccess">'#'</span>],
    [<span class="textsuccess">'text'</span> => <span class="textsuccess">'Disabled'</span>, <span class="textsuccess">'disabled'</span> => <span class="text-info">true</span>]
]);
<span class="text-warning">echo</span> <span class="text-warning">$list</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
