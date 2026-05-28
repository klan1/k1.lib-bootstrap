<?php
$component_name = 'Button';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Button</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\button &rarr; src/klan1/html/bootstrap/button.php</div>

    <div class="preview-label">Variants</div>
    <div class="preview-box">
        <?php
        $variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link'];
        foreach ($variants as $variant) {
            $v = constant("k1lib\\html\\bootstrap\\button::VARIANT_" . strtoupper($variant));
            echo (new \k1lib\html\bootstrap\components\button(ucfirst($variant), $v))->generate() . ' ';
        }
        ?>
    </div>

    <div class="preview-label">Outline</div>
    <div class="preview-box">
        <?php
        foreach ($variants as $variant) {
            if ($variant !== 'link') {
                $v = constant("k1lib\\html\\bootstrap\\button::VARIANT_" . strtoupper($variant));
                echo (new \k1lib\html\bootstrap\components\button(ucfirst($variant), $v, \k1lib\html\bootstrap\components\button::SIZE_MD, TRUE))->generate() . ' ';
            }
        }
        ?>
    </div>

    <div class="preview-label">Sizes</div>
    <div class="preview-box">
        <?php
        echo (new \k1lib\html\bootstrap\components\button('Large', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY, \k1lib\html\bootstrap\components\button::SIZE_LG))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\button('Default', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY))->generate() . ' ';
        echo (new \k1lib\html\bootstrap\components\button('Small', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY, \k1lib\html\bootstrap\components\button::SIZE_SM))->generate();
        ?>
    </div>

    <div class="preview-label">States</div>
    <div class="preview-box">
        <?php
        $disabled_btn = new \k1lib\html\bootstrap\components\button('Disabled', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY);
        $disabled_btn->set_disabled();
        echo $disabled_btn->generate() . ' ';

        $active_btn = new \k1lib\html\bootstrap\components\button('Active', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY);
        $active_btn->set_active();
        echo $active_btn->generate() . ' ';

        $toggle_btn = new \k1lib\html\bootstrap\components\button('Toggle', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY, \k1lib\html\bootstrap\components\button::SIZE_MD, TRUE);
        $toggle_btn->set_toggle();
        echo $toggle_btn->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic button</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\button(<span class="text-success">'Click me'</span>, \k1lib\html\bootstrap\components\button::<span class="text-light">VARIANT_PRIMARY</span>);

<span class="text-primary">// Outline variant</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\button(<span class="text-success">'Outline'</span>, \k1lib\html\bootstrap\components\button::<span class="text-light">VARIANT_PRIMARY</span>, \k1lib\html\bootstrap\components\button::<span class="text-light">SIZE_MD</span>, <span class="text-info">true</span>);

<span class="text-primary">// Disabled state</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\button(<span class="text-success">'Disabled'</span>);
<span class="text-warning">$btn</span>-><span class="text-light">set_disabled</span>();

<span class="text-warning">echo</span> <span class="text-warning">$btn</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
