<?php
$component_name = 'Nav';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Nav</h2>
    <div class="component-ref">\k1lib\html\bootstrap\nav &rarr; src/klan1/html/componentes/nav.php</div>

    <div class="preview-label">Tabs</div>
    <div class="preview-box">
        <?php
        $demo_nav_tabs = new \k1lib\html\bootstrap\nav([
            ['text' => 'Home', 'href' => '#', 'active' => true],
            ['text' => 'Features', 'href' => '#'],
            ['text' => 'Pricing', 'href' => '#'],
            ['text' => 'Disabled', 'href' => '#', 'disabled' => true]
        ], 'tabs');
        echo $demo_nav_tabs->generate();
        ?>
    </div>

    <div class="preview-label">Pills</div>
    <div class="preview-box">
        <?php
        $demo_nav_pills = new \k1lib\html\bootstrap\nav([
            ['text' => 'Home', 'href' => '#', 'active' => true],
            ['text' => 'Features', 'href' => '#'],
            ['text' => 'Pricing', 'href' => '#'],
        ], 'pills');
        echo $demo_nav_pills->generate();
        ?>
    </div>

    <div class="preview-label">Underline</div>
    <div class="preview-box">
        <?php
        $demo_nav_underline = new \k1lib\html\bootstrap\nav([
            ['text' => 'Home', 'href' => '#', 'active' => true],
            ['text' => 'Features', 'href' => '#'],
            ['text' => 'Pricing', 'href' => '#'],
        ], 'underline');
        echo $demo_nav_underline->generate();
        ?>
    </div>

    <div class="preview-label">Vertical Pills</div>
    <div class="preview-box">
        <?php
        $demo_nav_vertical = new \k1lib\html\bootstrap\nav([
            ['text' => 'Home', 'href' => '#', 'active' => true],
            ['text' => 'Features', 'href' => '#'],
            ['text' => 'Pricing', 'href' => '#'],
        ], 'pills', true);
        echo $demo_nav_vertical->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic tabs</span>
<span class="text-warning">$nav</span> = <span class="text-info">new</span> \k1lib\html\componentes\nav([
    [<span class="text-success">'text'</span> => <span class="text-success">'Home'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>, <span class="text-success">'active'</span> => <span class="text-info">true</span>],
    [<span class="text-success">'text'</span> => <span class="text-success">'Features'</span>, <span class="text-success">'href'</span> => <span class="textsuccess">'#'</span>]
], <span class="textsuccess">'tabs'</span>);

<span class="text-primary">// Vertical pills</span>
<span class="text-warning">$nav</span> = <span class="text-info">new</span> \k1lib\html\componentes\nav([...], <span class="text-success">'pills'</span>, <span class="text-info">true</span>);

<span class="text-primary">// Tabbed interface with content</span>
<span class="text-warning">$tabs</span> = \k1lib\html\componentes\nav::<span class="textlight">create_tabs</span>(<span class="textsuccess">'myTabs'</span>, [
    [<span class="textsuccess">'id'</span> => <span class="textsuccess">'home'</span>, <span class="textsuccess">'label'</span> => <span class="textsuccess">'Home'</span>, <span class="textsuccess">'content'</span> => <span class="textsuccess">'<p>Content</p>'</span>]
]);
<span class="text-warning">echo</span> <span class="text-warning">$tabs</span>[<span class="text-success">'nav'</span>]-><span class="textlight">generate</span>();
<span class="text-warning">echo</span> <span class="text-warning">$tabs</span>[<span class="textsuccess">'content'</span>]-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
