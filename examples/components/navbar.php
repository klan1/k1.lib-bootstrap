<?php
$component_name = 'Navbar';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Navbar</h2>
    <div class="component-ref">\k1lib\html\bootstrap\navbar &rarr; src/klan1/html/bootstrap/navbar.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $demo_navbar = new navbar('Brand Name', 'demoNav', 'light', 'lg');
        $nav_links = new nav_component([
            ['text' => 'Home', 'href' => '#', 'active' => true],
            ['text' => 'Link', 'href' => '#'],
            ['text' => 'Dropdown', 'href' => '#']
        ], 'nav');
        $demo_navbar->add_to_collapse($nav_links);
        echo $demo_navbar->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$navbar</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="text-success">'Brand'</span>, <span class="textsuccess">'demoNav'</span>, <span class="textsuccess">'light'</span>);
<span class="text-warning">$nav</span> = <span class="text-info">new</span> \k1lib\html\componentes\nav([...], <span class="textsuccess">'nav'</span>);
<span class="text-warning">$navbar</span>-><span class="textlight">add_to_collapse</span>(<span class="textwarning">$nav</span>);
<span class="text-warning">echo</span> <span class="textwarning">$navbar</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
