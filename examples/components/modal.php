<?php
$component_name = 'Modal';
require_once __DIR__ . '/../_header.php';
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
        $modal = new \k1lib\html\bootstrap\modal('Modal Title', '<p>This is the modal body content.</p>', [
            'id' => 'demoModal',
            'btn_cancel' => 'Cancel',
            'btn_ok' => 'Confirm',
        ]);
        echo $modal->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$modal</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\modal(
    <span class="textsuccess">'Modal Title'</span>,
    <span class="textsuccess">'<p>Content</p>'</span>,
    [
        <span class="textsuccess">'btn_cancel'</span> => <span class="textsuccess">'Cancel'</span>,
        <span class="textsuccess">'btn_ok'</span> => <span class="textsuccess">'Confirm'</span>,
    ]
);
<span class="textwarning">echo</span> <span class="textwarning">$modal</span>-><span class="textlight">generate</span>();</code></pre>
    </div>

    <div class="preview-label mt-4">Scrollable</div>
    <div class="preview-box">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollableModal">
            Open Scrollable Modal
        </button>
        <?php
        $long_content = str_repeat('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>', 20);
        $modal_scroll = new \k1lib\html\bootstrap\modal('Scrollable Modal', $long_content, [
            'id' => 'scrollableModal',
            'scrollable' => TRUE,
            'btn_ok' => 'Got it',
        ]);
        echo $modal_scroll->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$modal_scroll</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\modal(
    <span class="textsuccess">'Scrollable Modal'</span>,
    <span class="textsuccess">$long_content</span>,
    [
        <span class="textsuccess">'scrollable'</span> => <span class="textinfo">true</span>,
        <span class="textsuccess">'btn_ok'</span> => <span class="textsuccess">'Got it'</span>,
    ]
);</code></pre>
    </div>

    <div class="preview-label mt-4">Centered</div>
    <div class="preview-box">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centeredModal">
            Open Centered Modal
        </button>
        <?php
        $modal_center = new \k1lib\html\bootstrap\modal('Centered Modal', '<p>This modal is vertically centered.</p>', [
            'id' => 'centeredModal',
            'centered' => TRUE,
        ]);
        echo $modal_center->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$modal_center</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\modal(
    <span class="textsuccess">'Centered Modal'</span>,
    <span class="textsuccess">'<p>Content</p>'</span>,
    [<span class="textsuccess">'centered'</span> => <span class="textinfo">true</span>]
);</code></pre>
    </div>

    <div class="preview-label mt-4">Sizes</div>
    <div class="preview-box">
        <div class="d-flex gap-2 flex-wrap">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                Small
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                Large
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extraLargeModal">
                Extra Large
            </button>
        </div>
        <?php
        $modal_sm = new \k1lib\html\bootstrap\modal('Small Modal', '<p>Small size modal.</p>', ['id' => 'smallModal', 'size' => 'sm']);
        echo $modal_sm->generate();

        $modal_lg = new \k1lib\html\bootstrap\modal('Large Modal', '<p>Large size modal.</p>', ['id' => 'largeModal', 'size' => 'lg']);
        echo $modal_lg->generate();

        $modal_xl = new \k1lib\html\bootstrap\modal('Extra Large Modal', '<p>Extra large size modal.</p>', ['id' => 'extraLargeModal', 'size' => 'xl']);
        echo $modal_xl->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textcomment">// Small</span>
<span class="textwarning">$modal</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\modal(<span class="textsuccess">'Title'</span>, <span class="textsuccess">'Content'</span>, [<span class="textsuccess">'size'</span> => <span class="textsuccess">'sm'</span>]);

<span class="textcomment">// Large</span>
<span class="textwarning">$modal</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\modal(<span class="textsuccess">'Title'</span>, <span class="textsuccess">'Content'</span>, [<span class="textsuccess">'size'</span> => <span class="textsuccess">'lg'</span>]);

<span class="textcomment">// Extra Large</span>
<span class="textwarning">$modal</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\modal(<span class="textsuccess">'Title'</span>, <span class="textsuccess">'Content'</span>, [<span class="textsuccess">'size'</span> => <span class="textsuccess">'xl'</span>]);</code></pre>
    </div>

    <div class="preview-label mt-4">No footer buttons</div>
    <div class="preview-box">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noFooterModal">
            Open Modal without footer
        </button>
        <?php
        $modal_no_footer = new \k1lib\html\bootstrap\modal('No Footer Modal', '<p>This modal has no footer buttons.</p>', [
            'id' => 'noFooterModal',
            'btn_ok' => '',
            'btn_cancel' => '',
        ]);
        echo $modal_no_footer->generate();
        ?>
    </div>

    <div class="code-block">
        <div class="code-header">
            <div class="code-dots"><span></span><span></span><span></span></div>
            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
        </div>
        <pre class="code-content"><code><span class="textwarning">$modal</span> = <span class="textinfo">new</span> \k1lib\html\bootstrap\modal(
    <span class="textsuccess">'Title'</span>,
    <span class="textsuccess">'Content'</span>,
    [<span class="textsuccess">'btn_ok'</span> => <span class="textsuccess">''</span>, <span class="textsuccess">'btn_cancel'</span> => <span class="textsuccess">''</span>]
);</code></pre>
    </div>
</section>

</div></body></html>