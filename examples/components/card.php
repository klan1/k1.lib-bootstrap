<?php
$component_name = 'Card';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Card</h2>
    <div class="component-ref">\k1lib\html\bootstrap\card &rarr; src/klan1/html/bootstrap/card.php</div>

    <div class="preview-label">Basic Card</div>
    <div class="preview-box" style="max-width: 400px;">
        <?php
        $demo_card = new card('Card Title', 'Card Subtitle', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.');
        $demo_card->body()->append_child(new \k1lib\html\bootstrap\button('Go somewhere', button::VARIANT_PRIMARY));
        echo $demo_card->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$card</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\card(
    <span class="text-success">'Card Title'</span>,
    <span class="text-success">'Card Subtitle'</span>,
    <span class="text-success">'Card content text'</span>
);
<span class="text-warning">$card</span>-><span class="text-light">body</span>()-><span class="text-light">append_child</span>(
    <span class="text-info">new</span> \k1lib\html\bootstrap\button(<span class="text-success">'Go somewhere'</span>, \k1lib\html\bootstrap\button::<span class="text-light">VARIANT_PRIMARY</span>)
);
<span class="text-warning">echo</span> <span class="text-warning">$card</span>-><span class="text-light">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
