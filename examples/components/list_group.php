<?php
$component_name = 'List Group';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">List Group</h2>
    <div class="component-ref">\k1lib\html\bootstrap\list_group &rarr; src/klan1/html/bootstrap/list_group.php</div>

    <div class="preview-label">Basic example</div>
    <div class="preview-box">
        <?php
        $list = new \k1lib\html\bootstrap\list_group();
        $list->add_item('An item');
        $list->add_item('A second item');
        $list->add_item('A third item');
        $list->add_item('A fourth item');
        $list->add_item('And a fifth one');
        echo $list->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$list</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\list_group();
<span class="text-warning">$list</span>-><span class="text-light">add_item</span>(<span class="text-success">'An item'</span>);
<span class="text-warning">$list</span>-><span class="text-light">add_item</span>(<span class="text-success">'A second item'</span>);
<span class="text-warning">$list</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'A third item'</span>);
<span class="textwarning">echo</span> <span class="text-warning">$list</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Active items</div>
    <div class="preview-box">
        <?php
        $list2 = new \k1lib\html\bootstrap\list_group();
        $list2->add_item('An active item', NULL, true);
        $list2->add_item('A second item');
        $list2->add_item('A third item');
        echo $list2->generate();
        ?>
    </div>

    <div class="preview-label mt-4">Links and buttons (href provided)</div>
    <div class="preview-box">
        <?php
        $list3 = new \k1lib\html\bootstrap\list_group();
        $list3->add_item('The current button', '#', true);
        $list3->add_item('A second button item', '#');
        $list3->add_item('A third button item', '#');
        $list3->add_item('A fourth button item', '#');
        $list3->add_item('A disabled button item', '#', false, true);
        echo $list3->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$list</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\list_group();
<span class="text-warning">$list</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'The current button'</span>, <span class="textsuccess">'#'</span>, <span class="text-info">true</span>);  <span class="text-secondary">// href, active</span>
<span class="text-warning">$list</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'A second button item'</span>, <span class="textsuccess">'#'</span>);
<span class="text-warning">$list</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'A third button item'</span>, <span class="textsuccess">'#'</span>);
<span class="text-warning">$list</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'A disabled button item'</span>, <span class="textsuccess">'#'</span>, <span class="text-info">false</span>, <span class="text-info">true</span>);  <span class="text-secondary">// disabled</span>
<span class="textwarning">echo</span> <span class="textwarning">$list</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Flush (no borders)</div>
    <div class="preview-box">
        <?php
        $list4 = new \k1lib\html\bootstrap\list_group([], true);
        $list4->add_item('An item');
        $list4->add_item('A second item');
        $list4->add_item('A third item');
        echo $list4->generate();
        ?>
    </div>
</section>

</div></body></html>