<?php
$component_name = 'Modal';
require_once __DIR__ . '/_header.php';
?>

<section class="component-section">
    <h2 class="component-title">Modal</h2>
    <div class="component-ref">\k1lib\html\bootstrap\modal &rarr; src/klan1/html/bootstrap/modal.php</div>

    <div class="preview-label">Basic</div>
    <div class="preview-box">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#demoModal">
            Open Modal
        </button>
        <?php
        $modal = new modal('Modal Title', '<p>This is the modal body content.</p>', 'Cancel', 'Confirm', 'demoModal');
        echo $modal->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="text-warning">$modal</span> = <span class="text-info">new</span> \k1lib\html\bootstrap\modal(
    <span class="text-success">'Modal Title'</span>,
    <span class="text-success">'<p>Content</p>'</span>,
    <span class="text-success">'Cancel'</span>,
    <span class="text-success">'Confirm'</span>
);
<span class="text-warning">echo</span> <span class="text-warning">$modal</span>-><span class="textlight">generate</span>();</code></pre>
    </div>
</section>

</div></body></html>
