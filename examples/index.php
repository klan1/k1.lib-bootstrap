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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
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
            <a href="https://github.com/klan1/k1.lib-bootstrap" class="btn btn-light" target="_blank">
                <i class="bi bi-github me-1"></i> View on GitHub
            </a>
        </div>

        <div class="section-title">Components</div>
        <div class="row g-4">
            <?php
            $components = [
                ['name' => 'Accordion', 'file' => 'components/accordion.php', 'ns' => '\k1lib\html\bootstrap\accordion', 'desc' => 'Vertically collapsing accordion component'],
                ['name' => 'Alert', 'file' => 'components/alert.php', 'ns' => '\k1lib\html\bootstrap\alert', 'desc' => 'Dismissible alert messages'],
                ['name' => 'Badge', 'file' => 'components/badge.php', 'ns' => '\k1lib\html\bootstrap\badge', 'desc' => 'Badges and pill badges'],
                ['name' => 'Breadcrumb', 'file' => 'components/breadcrumb.php', 'ns' => '\k1lib\html\bootstrap\breadcrumb', 'desc' => 'Navigation breadcrumbs'],
                ['name' => 'Button', 'file' => 'components/button.php', 'ns' => '\k1lib\html\bootstrap\button', 'desc' => 'Buttons with variants, sizes, and states'],
                ['name' => 'Button Group', 'file' => 'components/button_group.php', 'ns' => '\k1lib\html\bootstrap\button_group', 'desc' => 'Group buttons together'],
                ['name' => 'Card', 'file' => 'components/card.php', 'ns' => '\k1lib\html\bootstrap\card', 'desc' => 'Flexible card component'],
                ['name' => 'Callout', 'file' => 'components/callout.php', 'ns' => '\k1lib\html\bootstrap\callout', 'desc' => 'Callout/notice boxes'],
                ['name' => 'Collapse', 'file' => 'components/collapse.php', 'ns' => '\k1lib\html\bootstrap\collapse', 'desc' => 'Collapsible content'],
                ['name' => 'Dropdown', 'file' => 'components/dropdown.php', 'ns' => '\k1lib\html\bootstrap\dropdown', 'desc' => 'Dropdown menus'],
                ['name' => 'Grid', 'file' => 'components/grid.php', 'ns' => '\k1lib\html\bootstrap\grid', 'desc' => 'Bootstrap grid system'],
                ['name' => 'List Group', 'file' => 'components/list_group.php', 'ns' => '\k1lib\html\bootstrap\list_group', 'desc' => 'List group component'],
                ['name' => 'Modal', 'file' => 'components/modal.php', 'ns' => '\k1lib\html\bootstrap\modal', 'desc' => 'Modal dialogs'],
                ['name' => 'Nav', 'file' => 'components/nav.php', 'ns' => '\k1lib\html\componentes\nav', 'desc' => 'Navigation components'],
                ['name' => 'Navbar', 'file' => 'components/navbar.php', 'ns' => '\k1lib\html\bootstrap\navbar', 'desc' => 'Navbar component'],
                ['name' => 'Pagination', 'file' => 'components/pagination.php', 'ns' => '\k1lib\html\bootstrap\pagination', 'desc' => 'Pagination component'],
                ['name' => 'Progress', 'file' => 'components/progress.php', 'ns' => '\k1lib\html\bootstrap\progress', 'desc' => 'Progress bars'],
                ['name' => 'Spinner', 'file' => 'components/spinner.php', 'ns' => '\k1lib\html\bootstrap\spinner', 'desc' => 'Loading spinners'],
                ['name' => 'Table', 'file' => 'components/table_from_data.php', 'ns' => '\k1lib\html\bootstrap\table_from_data', 'desc' => 'Table from data array'],
                ['name' => 'Title Bar', 'file' => 'components/title_bar.php', 'ns' => '\k1lib\html\bootstrap\title_bar', 'desc' => 'Page title bar'],
                ['name' => 'Toast', 'file' => 'components/toast.php', 'ns' => '\k1lib\html\bootstrap\toast', 'desc' => 'Toast notifications'],
            ];

            foreach ($components as $comp):
            ?>
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

        <footer class="mt-5 mb-3 text-center text-muted">
            <p class="small">k1.lib-bootstrap &copy; <?= date('Y') ?> &middot; Built with Bootstrap 5</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
