<?php
$component_name = 'Button Group';
require_once __DIR__ . '/../_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Button Group</h2>
    <div class="component-ref">\k1lib\html\bootstrap\components\button_group &rarr; src/klan1/html/bootstrap/button_group.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <?php
        $group = new \k1lib\html\bootstrap\components\button_group();
        $group->add_button(new \k1lib\html\bootstrap\components\button('Left', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY))
              ->add_button(new \k1lib\html\bootstrap\components\button('Center', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY))
              ->add_button(new \k1lib\html\bootstrap\components\button('Right', \k1lib\html\bootstrap\components\button::VARIANT_PRIMARY));
        echo $group->generate();
        ?>
    </div>

    <div class="preview-label">Sizes</div>
    <div class="preview-box">
        <?php
        $group_sm = new \k1lib\html\bootstrap\components\button_group('sm');
        $group_sm->add_button(new \k1lib\html\bootstrap\components\button('Small', \k1lib\html\bootstrap\components\button::VARIANT_SECONDARY))
                 ->add_button(new \k1lib\html\bootstrap\components\button('Small', \k1lib\html\bootstrap\components\button::VARIANT_SECONDARY));
        echo $group_sm->generate() . ' ';

        $group_lg = new \k1lib\html\bootstrap\components\button_group('lg');
        $group_lg->add_button(new \k1lib\html\bootstrap\components\button('Large', \k1lib\html\bootstrap\components\button::VARIANT_SECONDARY))
                 ->add_button(new \k1lib\html\bootstrap\components\button('Large', \k1lib\html\bootstrap\components\button::VARIANT_SECONDARY));
        echo $group_lg->generate();
        ?>
    </div>

    <div class="preview-label">Vertical</div>
    <div class="preview-box">
        <?php
        $group_v = new \k1lib\html\bootstrap\components\button_group('md', TRUE);
        $group_v->add_button(new \k1lib\html\bootstrap\components\button('Top', \k1lib\html\bootstrap\components\button::VARIANT_INFO))
                 ->add_button(new \k1lib\html\bootstrap\components\button('Middle', \k1lib\html\bootstrap\components\button::VARIANT_INFO))
                 ->add_button(new \k1lib\html\bootstrap\components\button('Bottom', \k1lib\html\bootstrap\components\button::VARIANT_INFO));
        echo $group_v->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-primary">// Basic group</span>
<span class="text-warning">$group</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\button_group();
<span class="text-warning">$group</span>-><span class="text-light">add_button</span>(<span class="text-info">new</span> \k1lib\html\bootstrap\components\button(<span class="text-success">'Left'</span>, \k1lib\html\bootstrap\\k1lib\html\bootstrap\components\button::<span class="text-light">VARIANT_PRIMARY</span>))
      -><span class="text-light">add_button</span>(<span class="text-info">new</span> \k1lib\html\bootstrap\components\button(<span class="text-success">'Center'</span>, \k1lib\html\bootstrap\\k1lib\html\bootstrap\components\button::<span class="text-light">VARIANT_PRIMARY</span>))
      -><span class="text-light">add_button</span>(<span class="text-info">new</span> \k1lib\html\bootstrap\components\button(<span class="text-success">'Right'</span>, \k1lib\html\bootstrap\\k1lib\html\bootstrap\components\button::<span class="text-light">VARIANT_PRIMARY</span>));

<span class="text-primary">// Vertical</span>
<span class="text-warning">$group</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\components\button_group(<span class="text-success">'md'</span>, <span class="text-info">true</span>);

<span class="text-primary">// Access buttons</span>
<span class="text-warning">$group</span>-><span class="text-light">button</span>(<span class="text-info">0</span>); <span class="text-secondary">// Returns first button</span></code></pre>
    </div>
</section>

</div></body></html>
