<?php
/**
 * Bootstrap 5 Components Showcase - Index
 *
 * @author Alejandro Trujillo J. <https://github.com/j0hnd03>
 * @link https://github.com/klan1/k1.lib-bootstrap
 * @license Apache-2.0
 */

require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>k1.lib-bootstrap - Components Showcase</title>
    <link href="/resources/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/bootstrap/bootstrap-icons.min.v2.css" rel="stylesheet">
    <style>
        :root { --bs-body-bg: #f8f9fa; }
        body { padding-top: 70px; background-color: var(--bs-body-bg); }
        .component-card {
            background: #fff;
            border-radius: .5rem;
            padding: 1.5rem;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
        }
        .component-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 .25rem .5rem rgba(0,0,0,.1);
        }
        .component-card h5 {
            color: #212529;
            font-weight: 600;
            margin-bottom: .5rem;
        }
        .component-card .ns {
            font-size: .75rem;
            color: #0d6efd;
            font-family: monospace;
        }
        .component-card .path {
            font-size: .7rem;
            color: #198754;
            font-family: monospace;
            margin-bottom: 1rem;
            display: block;
        }
        .component-card .btn {
            margin-top: auto;
        }
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: .5rem;
            margin-bottom: 2rem;
        }
        .hero-section h1 {
            font-weight: 700;
            margin-bottom: .5rem;
        }
        .hero-section p {
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }
        .section-title {
            color: #6c757d;
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-bottom: 1rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-grid-3x3-gap me-2"></i> k1.lib-bootstrap
            </a>
            <span class="navbar-text text-white-50">Bootstrap 5 Components</span>
        </div>
    </nav>

    <div class="container">
        <div class="hero-section">
            <h1><i class="bi bi-grid-3x3-gap me-2"></i> k1.lib-bootstrap</h1>
            <p>PHP components library wrapping Bootstrap 5 with an object-oriented interface.</p>
            <a href="/playground.php" class="btn btn-light me-2">
                <i class="bi bi-play-circle me-1"></i> Abrir Playground
            </a>
            <a href="/playground.php?file=group" class="btn btn-light me-2">
                <i class="bi bi-collection me-1"></i> Kitchen Sink
            </a>
            <a href="https://github.com/klan1/k1.lib-bootstrap" class="btn btn-light" target="_blank">
                <i class="bi bi-github me-1"></i> View on GitHub
            </a>
        </div>

        <?php
        $sections = [
    'Content' => [
        ['name' => 'Tables', 'file' => 'components/table_from_data.php', 'ns' => '\k1lib\html\bootstrap\components\table_from_data', 'desc' => 'Tables from data arrays'],
    ],
    'Layout' => [
        ['name' => 'Grid', 'file' => 'components/grid.php', 'ns' => '\k1lib\html\bootstrap\components\grid', 'desc' => 'Bootstrap grid system'],
    ],
    'Forms' => [
        ['name' => 'Form control', 'file' => 'components/form_control.php', 'ns' => '\k1lib\html\bootstrap\components\form_control', 'desc' => 'Textual inputs, textareas and plain text'],
        ['name' => 'Select', 'file' => 'components/form_select.php', 'ns' => '\k1lib\html\bootstrap\components\form_select', 'desc' => 'Custom select menus'],
        ['name' => 'Checks & radios', 'file' => 'components/form_check.php', 'ns' => '\k1lib\html\bootstrap\components\form_check', 'desc' => 'Checkboxes, radios and switches'],
        ['name' => 'Range', 'file' => 'components/range.php', 'ns' => '\k1lib\html\bootstrap\components\range', 'desc' => 'Range inputs'],
        ['name' => 'Input group', 'file' => 'components/input_group.php', 'ns' => '\k1lib\html\bootstrap\components\input_group', 'desc' => 'Addons, buttons and selects'],
        ['name' => 'Floating labels', 'file' => 'components/floating_label.php', 'ns' => '\k1lib\html\bootstrap\components\floating_label', 'desc' => 'Labels that float over controls'],
        ['name' => 'Layout', 'file' => 'components/form_layout.php', 'ns' => '\k1lib\html\bootstrap\components\form_layout', 'desc' => 'Grid, gutters, horizontal and inline layouts'],
        ['name' => 'Validation', 'file' => 'components/validation.php', 'ns' => '\k1lib\html\bootstrap\components\validation', 'desc' => 'Validation feedback messages'],
    ],
    'Components' => [
        ['name' => 'Accordion', 'file' => 'components/accordion.php', 'ns' => '\k1lib\html\bootstrap\components\accordion', 'desc' => 'Vertically collapsing content'],
        ['name' => 'Alerts', 'file' => 'components/alert.php', 'ns' => '\k1lib\html\bootstrap\components\alert', 'desc' => 'Contextual feedback messages'],
        ['name' => 'Badge', 'file' => 'components/badge.php', 'ns' => '\k1lib\html\bootstrap\components\badge', 'desc' => 'Small count and labeling'],
        ['name' => 'Breadcrumb', 'file' => 'components/breadcrumb.php', 'ns' => '\k1lib\html\bootstrap\components\breadcrumb', 'desc' => 'Navigation breadcrumbs'],
        ['name' => 'Button group', 'file' => 'components/button_group.php', 'ns' => '\k1lib\html\bootstrap\components\button_group', 'desc' => 'Group buttons together'],
        ['name' => 'Button toolbar', 'file' => 'components/button_toolbar.php', 'ns' => '\k1lib\html\bootstrap\components\button_toolbar', 'desc' => 'Group button groups'],
        ['name' => 'Buttons', 'file' => 'components/button.php', 'ns' => '\k1lib\html\bootstrap\components\button', 'desc' => 'Buttons with variants, sizes and states'],
        ['name' => 'Card', 'file' => 'components/card.php', 'ns' => '\k1lib\html\bootstrap\components\card', 'desc' => 'Flexible content container'],
        ['name' => 'Carousel', 'file' => 'components/carousel.php', 'ns' => '\k1lib\html\bootstrap\components\carousel', 'desc' => 'Slideshow component'],
        ['name' => 'Close button', 'file' => 'components/close_button.php', 'ns' => '\k1lib\html\bootstrap\components\close_button', 'desc' => 'Dismissible close button'],
        ['name' => 'Collapse', 'file' => 'components/collapse.php', 'ns' => '\k1lib\html\bootstrap\components\collapse', 'desc' => 'Collapsible content'],
        ['name' => 'Dropdowns', 'file' => 'components/dropdown.php', 'ns' => '\k1lib\html\bootstrap\components\dropdown', 'desc' => 'Dropdown menus'],
        ['name' => 'List group', 'file' => 'components/list_group.php', 'ns' => '\k1lib\html\bootstrap\components\list_group', 'desc' => 'List of items with variants'],
        ['name' => 'Modal', 'file' => 'components/modal.php', 'ns' => '\k1lib\html\bootstrap\components\modal', 'desc' => 'Modal dialogs'],
        ['name' => 'Navbar', 'file' => 'components/navbar.php', 'ns' => '\k1lib\html\bootstrap\components\navbar', 'desc' => 'Navbar component'],
        ['name' => 'Navs & tabs', 'file' => 'components/nav.php', 'ns' => '\k1lib\html\bootstrap\components\nav', 'desc' => 'Navigation tabs and pills'],
        ['name' => 'Offcanvas', 'file' => 'components/offcanvas.php', 'ns' => '\k1lib\html\bootstrap\components\offcanvas', 'desc' => 'Offcanvas panels'],
        ['name' => 'Pagination', 'file' => 'components/pagination.php', 'ns' => '\k1lib\html\bootstrap\components\pagination', 'desc' => 'Pagination controls'],
        ['name' => 'Placeholders', 'file' => 'components/placeholder.php', 'ns' => '\k1lib\html\bootstrap\components\placeholder', 'desc' => 'Loading placeholders'],
        ['name' => 'Popovers', 'file' => 'components/popover.php', 'ns' => '\k1lib\html\bootstrap\components\popover', 'desc' => 'Popovers'],
        ['name' => 'Progress', 'file' => 'components/progress.php', 'ns' => '\k1lib\html\bootstrap\components\progress', 'desc' => 'Progress bars'],
        ['name' => 'Scrollspy', 'file' => 'components/scrollspy.php', 'ns' => '\k1lib\html\bootstrap\components\scrollspy', 'desc' => 'Scrollspy navigation'],
        ['name' => 'Spinners', 'file' => 'components/spinner.php', 'ns' => '\k1lib\html\bootstrap\components\spinner', 'desc' => 'Loading spinners'],
        ['name' => 'Toasts', 'file' => 'components/toast.php', 'ns' => '\k1lib\html\bootstrap\components\toast', 'desc' => 'Toast notifications'],
        ['name' => 'Tooltips', 'file' => 'components/tooltip.php', 'ns' => '\k1lib\html\bootstrap\components\tooltip', 'desc' => 'Tooltips'],
    ],
    'Extras' => [
        ['name' => 'Callout', 'file' => 'components/callout.php', 'ns' => '\k1lib\html\bootstrap\components\callout', 'desc' => 'Documentation-style callouts'],
        ['name' => 'Title Bar', 'file' => 'components/title_bar.php', 'ns' => '\k1lib\html\bootstrap\components\title_bar', 'desc' => 'Page title bar'],
    ],
];
        foreach ($sections as $section_title => $components):
        ?>
        <div class="section-title"><?= $section_title ?></div>
        <div class="row g-4 mb-4">
            <?php foreach ($components as $comp): ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-box me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>

        <footer class="mt-5 mb-3 text-center text-muted">
            <p class="small">k1.lib-bootstrap &copy; <?= date('Y') ?> &middot; Built with Bootstrap 5</p>
        </footer>
    </div>

    <script src="/resources/bootstrap/bootstrap.bundle.min.js" defer></script>
</body>
</html>
