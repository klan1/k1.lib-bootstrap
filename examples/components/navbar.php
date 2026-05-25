<?php
$component_name = 'Navbar';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Navbar</h2>
    <div class="component-ref">\k1lib\html\bootstrap\navbar &rarr; src/klan1/html/bootstrap/navbar.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $navbar = new \k1lib\html\bootstrap\navbar('Brand', 'demoNavbar', 'light', 'lg');
        $navbar->add_item('Home', '#', true);
        $navbar->add_item('Link', '#');
        $navbar->add_item('Disabled', '#', false, true);
        echo $navbar->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$navbar</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Brand'</span>, <span class="textsuccess">'demoNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Link'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">$navbar</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Disabled'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">false</span>, <span class="textinfo">true</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Brand with image</div>
    <div class="preview-box">
        <?php
        $navbar_img = new \k1lib\html\bootstrap\navbar('', 'imgNavbar', 'light', 'lg');
        $navbar_img->set_brand_image('https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg', 'Bootstrap', 30, 24, '#');
        $navbar_img->add_item('Home', '#', true);
        $navbar_img->add_item('Features', '#');
        $navbar_img->add_item('Pricing', '#');
        echo $navbar_img->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_img</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">''</span>, <span class="textsuccess">'imgNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_img</span>-><span class="text-light">set_brand_image</span>(<span class="textsuccess">'https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg'</span>, <span class="textsuccess">'Bootstrap'</span>, <span class="textinfo">30</span>, <span class="textinfo">24</span>);
<span class="textwarning">$navbar_img</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar_img</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Features'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">$navbar_img</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Pricing'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_img</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Brand with image and text</div>
    <div class="preview-box">
        <?php
        $navbar_img_text = new \k1lib\html\bootstrap\navbar('', 'imgTextNavbar', 'light', 'lg');
        $navbar_img_text->set_brand_image('https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg', 'Bootstrap', 30, 24, '#');
        $navbar_img_text->add_text('Bootstrap');
        $navbar_img_text->add_item('Home', '#', true);
        $navbar_img_text->add_item('Features', '#');
        echo $navbar_img_text->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_img_text</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">''</span>, <span class="textsuccess">'imgTextNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_img_text</span>-><span class="text-light">set_brand_image</span>(<span class="textsuccess">'https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg'</span>, <span class="textsuccess">'Bootstrap'</span>, <span class="textinfo">30</span>, <span class="textinfo">24</span>);
<span class="textwarning">$navbar_img_text</span>-><span class="text-light">add_text</span>(<span class="textsuccess">'Bootstrap'</span>);
<span class="textwarning">$navbar_img_text</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar_img_text</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Features'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_img_text</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">With dropdown</div>
    <div class="preview-box">
        <?php
        $navbar_dropdown = new \k1lib\html\bootstrap\navbar('Dropdown Navbar', 'dropdownNavbar', 'light', 'lg');
        $navbar_dropdown->add_item('Home', '#', true);
        $navbar_dropdown->add_item('Link', '#');
        $navbar_dropdown->add_item('Dropdown', '#', false, false, [
            ['text' => 'Action', 'href' => '#'],
            ['text' => 'Another action', 'href' => '#'],
            'divider',
            ['text' => 'Something else here', 'href' => '#'],
        ]);
        $navbar_dropdown->add_item('Disabled', '#', false, true);
        echo $navbar_dropdown->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_dropdown</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Dropdown Navbar'</span>, <span class="textsuccess">'dropdownNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_dropdown</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar_dropdown</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Link'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">$navbar_dropdown</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Dropdown'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">false</span>, <span class="textinfo">false</span>, [
    [<span class="textsuccess">'text'</span> => <span class="textsuccess">'Action'</span>, <span class="textsuccess">'href'</span> => <span class="textsuccess">'#'</span>],
    [<span class="textsuccess">'text'</span> => <span class="textsuccess">'Another action'</span>, <span class="textsuccess">'href'</span> => <span class="textsuccess">'#'</span>],
    <span class="textsuccess">'divider'</span>,
    [<span class="textsuccess">'text'</span> => <span class="textsuccess">'Something else here'</span>, <span class="textsuccess">'href'</span> => <span class="textsuccess">'#'</span>],
]);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_dropdown</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Dark</div>
    <div class="preview-box" style="background-color: #1f1f1f; padding: 1rem; border-radius: .375rem;">
        <?php
        $navbar_dark = new \k1lib\html\bootstrap\navbar('Dark Navbar', 'darkNavbar', 'dark', 'lg');
        $navbar_dark->add_item('Home', '#', true);
        $navbar_dark->add_item('Link', '#');
        echo $navbar_dark->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_dark</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Dark Navbar'</span>, <span class="textsuccess">'darkNavbar'</span>, <span class="textsuccess">'dark'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_dark</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar_dark</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Link'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_dark</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">With form (search)</div>
    <div class="preview-box">
        <?php
        $navbar_form = new \k1lib\html\bootstrap\navbar('Brand', 'formNavbar', 'light', 'lg');
        $navbar_form->add_item('Home', '#', true);
        $navbar_form->add_item('Link', '#');
        $navbar_form->add_item('Disabled', '#', false, true);
        $navbar_form->add_form('Search', 'Search', 'btn-outline-success');
        echo $navbar_form->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_form</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Brand'</span>, <span class="textsuccess">'formNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_form</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar_form</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Link'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">$navbar_form</span>-><span class="text-light">add_form</span>(<span class="textsuccess">'Search'</span>, <span class="textsuccess">'Search'</span>, <span class="textsuccess">'btn-outline-success'</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_form</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">With text</div>
    <div class="preview-box">
        <?php
        $navbar_text = new \k1lib\html\bootstrap\navbar('Brand', 'textNavbar', 'light', 'lg');
        $navbar_text->add_item('Home', '#', true);
        $navbar_text->add_item('Features', '#');
        $navbar_text->add_item('Pricing', '#');
        $navbar_text->add_text('Navbar text with an inline element');
        echo $navbar_text->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_text</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Brand'</span>, <span class="textsuccess">'textNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_text</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar_text</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Features'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">$navbar_text</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Pricing'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">$navbar_text</span>-><span class="text-light">add_text</span>(<span class="textsuccess">'Navbar text with an inline element'</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_text</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Custom background color (bg-primary)</div>
    <div class="preview-box" style="background-color: #e3f2fd; padding: 1rem; border-radius: .375rem;">
        <?php
        $navbar_bg = new \k1lib\html\bootstrap\navbar('Custom BG', 'bgNavbar', 'light', 'lg');
        $navbar_bg->set_class('bg-primary');
        $navbar_bg->add_item('Home', '#', true);
        $navbar_bg->add_item('Link', '#');
        $navbar_bg->add_form('Search', 'Search', 'btn-outline-light');
        echo $navbar_bg->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_bg</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Custom BG'</span>, <span class="textsuccess">'bgNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_bg</span>-><span class="text-light">set_class</span>(<span class="textsuccess">'bg-primary'</span>);
<span class="textwarning">$navbar_bg</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">$navbar_bg</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Link'</span>, <span class="textsuccess">'#'</span>);
<span class="textwarning">$navbar_bg</span>-><span class="text-light">add_form</span>(<span class="textsuccess">'Search'</span>, <span class="textsuccess">'Search'</span>, <span class="textsuccess">'btn-outline-light'</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_bg</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Fixed top</div>
    <div class="preview-box" style="height: 200px; position: relative;">
        <?php
        $navbar_fixed = new \k1lib\html\bootstrap\navbar('Fixed Top', 'fixedNavbar', 'light', 'lg');
        $navbar_fixed->set_placement('fixed-top');
        $navbar_fixed->add_item('Home', '#', true);
        $navbar_fixed->add_item('Link', '#');
        echo $navbar_fixed->generate();
        ?>
        <div style="padding: 2rem; background: #f8f9fa; border-radius: .375rem; margin-top: 70px;">
            Scroll down to see the fixed navbar stay at the top.
        </div>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_fixed</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Fixed Top'</span>, <span class="textsuccess">'fixedNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_fixed</span>-><span class="text-light">set_placement</span>(<span class="textsuccess">'fixed-top'</span>);
<span class="textwarning">$navbar_fixed</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_fixed</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Fixed bottom</div>
    <div class="preview-box" style="height: 200px; position: relative; overflow: hidden;">
        <div style="padding: 2rem; background: #f8f9fa; border-radius: .375rem;">
            Scroll up to see the fixed navbar stay at the bottom.
        </div>
        <?php
        $navbar_bottom = new \k1lib\html\bootstrap\navbar('Fixed Bottom', 'bottomNavbar', 'light', 'lg');
        $navbar_bottom->set_placement('fixed-bottom');
        $navbar_bottom->add_item('Home', '#', true);
        $navbar_bottom->add_item('Link', '#');
        echo $navbar_bottom->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_bottom</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Fixed Bottom'</span>, <span class="textsuccess">'bottomNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_bottom</span>-><span class="text-light">set_placement</span>(<span class="textsuccess">'fixed-bottom'</span>);
<span class="textwarning">$navbar_bottom</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_bottom</span>-><span class="text-light">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Sticky top</div>
    <div class="preview-box" style="background-color: #e3f2fd; padding: 1rem; border-radius: .375rem;">
        <?php
        $navbar_sticky = new \k1lib\html\bootstrap\navbar('Sticky Top', 'stickyNavbar', 'light', 'lg');
        $navbar_sticky->set_placement('sticky-top');
        $navbar_sticky->add_item('Home', '#', true);
        $navbar_sticky->add_item('Link', '#');
        echo $navbar_sticky->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$navbar_sticky</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\navbar(<span class="textsuccess">'Sticky Top'</span>, <span class="textsuccess">'stickyNavbar'</span>, <span class="textsuccess">'light'</span>, <span class="textsuccess">'lg'</span>);
<span class="textwarning">$navbar_sticky</span>-><span class="text-light">set_placement</span>(<span class="textsuccess">'sticky-top'</span>);
<span class="textwarning">$navbar_sticky</span>-><span class="text-light">add_item</span>(<span class="textsuccess">'Home'</span>, <span class="textsuccess">'#'</span>, <span class="textinfo">true</span>);
<span class="textwarning">echo</span> <span class="textwarning">$navbar_sticky</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>