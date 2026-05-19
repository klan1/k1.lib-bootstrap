<?php
/**
 * Bootstrap 5 Components Showcase
 *
 * Interactive demo and documentation for k1.lib-bootstrap components.
 * Each component is displayed with its rendered output and the code used to create it.
 *
 * @author Alejandro Trujillo J. (J0hnd03)
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
        body { padding-top: 60px; background: #f8f9fa; }
        .component-section { background: #fff; border-radius: 8px; margin-bottom: 2rem; padding: 2rem; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
        .code-block { background: #2d2d2d; color: #f8f8f2; border-radius: 6px; padding: 1rem; font-family: 'Fira Code', monospace; font-size: 0.85rem; overflow-x: auto; }
        .code-block code { color: #f8f8f2; white-space: pre; }
        .preview-box { min-height: 100px; border: 1px solid #e0e0e0; border-radius: 6px; padding: 1.5rem; margin-bottom: 1rem; background: #fff; }
        .preview-label { font-size: .75rem; text-transform: uppercase; color: #6c757d; margin-bottom: .5rem; font-weight: 600; letter-spacing: .05em; }
        .nav-sticky { top: 70px; }
        .nav-link.active { background-color: #0d6efd !important; color: #fff !important; }
        h2.section-title { border-bottom: 2px solid #0d6efd; padding-bottom: .5rem; margin-bottom: 1.5rem; }
        .badge-demo .badge { margin-right: .25rem; }
        .spinner-demo { display: inline-block; width: 2rem; height: 2rem; vertical-align: text-bottom; }
        .spinner-grow-demo { display: inline-block; width: 2rem; height: 2rem; vertical-align: text-bottom; }
        .progress-demo .progress { margin-bottom: .5rem; }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#componentNav">
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-grid-3x3-gap"></i> k1.lib-bootstrap
            </a>
            <span class="navbar-text text-white-50">Bootstrap 5 Components Showcase</span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav id="componentNav" class="nav flex-column nav-pills nav-sticky card p-3 mb-3" style="position: sticky; top: 70px;">
                    <span class="nav-link text-muted mb-2" style="font-size: .75rem; text-transform: uppercase;">Components</span>
                    <a class="nav-link" href="#alert">Alert</a>
                    <a class="nav-link" href="#badge">Badge</a>
                    <a class="nav-link" href="#breadcrumb">Breadcrumb</a>
                    <a class="nav-link" href="#button-group">Button Group</a>
                    <a class="nav-link" href="#card">Card</a>
                    <a class="nav-link" href="#callout">Callout</a>
                    <a class="nav-link" href="#collapse">Collapse</a>
                    <a class="nav-link" href="#dropdown">Dropdown</a>
                    <a class="nav-link" href="#grid">Grid</a>
                    <a class="nav-link" href="#list-group">List Group</a>
                    <a class="nav-link" href="#menu">Menu</a>
                    <a class="nav-link" href="#modal">Modal</a>
                    <a class="nav-link" href="#nav">Nav</a>
                    <a class="nav-link" href="#navbar">Navbar</a>
                    <a class="nav-link" href="#pagination">Pagination</a>
                    <a class="nav-link" href="#progress">Progress</a>
                    <a class="nav-link" href="#spinner">Spinner</a>
                    <a class="nav-link" href="#table">Table</a>
                    <a class="nav-link" href="#toast">Toast</a>
                    <a class="nav-link" href="#title-bar">Title Bar</a>
                    <a class="nav-link" href="#top-bar">Top Bar</a>
                </nav>
            </div>

            <div class="col-md-9">

                <!-- Alert -->
                <section id="alert" class="component-section">
                    <h2 class="section-title">Alert</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\alert;

                        $demo_alert = new alert('This is a primary alert—check it out!', 'primary', true);
                        $demo_alert->set_heading('Important Message');
                        echo $demo_alert->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\alert;

$demo_alert = new alert(
    \'This is a primary alert—check it out!\',
    \'primary\',
    true
);
$demo_alert->set_heading(\'Important Message\');
echo $demo_alert->generate();') ?></code></div>
                </section>

                <!-- Badge -->
                <section id="badge" class="component-section">
                    <h2 class="section-title">Badge</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box badge-demo">
                        <?php
                        use k1\lib\html\bootstrap\badge;

                        echo (new badge('Primary'))->generate() . ' ';
                        echo (new badge('Secondary', 'secondary'))->generate() . ' ';
                        echo (new badge('Success', 'success'))->generate() . ' ';
                        echo (new badge('Danger', 'danger'))->generate() . ' ';
                        echo (new badge('Warning', 'warning'))->generate() . ' ';
                        echo (new badge('Info', 'info'))->generate() . ' ';
                        echo (new badge('Light', 'light'))->generate() . ' ';
                        echo (new badge('Dark', 'dark'))->generate() . ' ';
                        echo (new badge('Pill Badge', 'primary', true))->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\badge;

echo (new badge(\'Primary\'))->generate() . \' \';
echo (new badge(\'Secondary\', \'secondary\'))->generate() . \' \';
echo (new badge(\'Success\', \'success\'))->generate() . \' \';
echo (new badge(\'Pill Badge\', \'primary\', true))->generate();') ?></code></div>
                </section>

                <!-- Breadcrumb -->
                <section id="breadcrumb" class="component-section">
                    <h2 class="section-title">Breadcrumb</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\breadcrumb;

                        $bread = new breadcrumb([
                            ['text' => 'Home', 'href' => '#'],
                            ['text' => 'Library', 'href' => '#'],
                            ['text' => 'Data', 'href' => '#'],
                            ['text' => 'Current Page']
                        ]);
                        echo $bread->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\breadcrumb;

$bread = new breadcrumb([
    [\'text\' => \'Home\', \'href\' => \'#\'],
    [\'text\' => \'Library\', \'href\' => \'#\'],
    [\'text\' => \'Data\', \'href\' => \'#\'],
    [\'text\' => \'Current Page\']
]);
echo $bread->generate();') ?></code></div>
                </section>

                <!-- Button Group -->
                <section id="button-group" class="component-section">
                    <h2 class="section-title">Button Group</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\button_group;
                        use k1\lib\html\button as btn;

                        $btn1 = new btn('Left', 'btn-primary');
                        $btn2 = new btn('Center', 'btn-primary');
                        $btn3 = new btn('Right', 'btn-primary');

                        $group = new button_group([$btn1, $btn2, $btn3]);
                        echo $group->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\button_group;
use k1\lib\html\button as btn;

$btn1 = new btn(\'Left\', \'btn-primary\');
$btn2 = new btn(\'Center\', \'btn-primary\');
$btn3 = new btn(\'Right\', \'btn-primary\');

$group = new button_group([$btn1, $btn2, $btn3]);
echo $group->generate();') ?></code></div>
                </section>

                <!-- Card -->
                <section id="card" class="component-section">
                    <h2 class="section-title">Card</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box" style="max-width: 400px;">
                        <?php
                        use k1\lib\html\bootstrap\card;

                        $demo_card = new card('Card Title', 'Card Subtitle', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.');
                        $demo_card->body()->append_a('#', 'Go somewhere', 'btn btn-primary');
                        echo $demo_card->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\card;

$demo_card = new card(
    \'Card Title\',
    \'Card Subtitle\',
    \'Some quick example text...\'
);
$demo_card->body()->append_a(\'#\', \'Go somewhere\', \'btn btn-primary\');
echo $demo_card->generate();') ?></code></div>
                </section>

                <!-- Callout -->
                <section id="callout" class="component-section">
                    <h2 class="section-title">Callout</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\callout;

                        $callout = new callout('This is a dismissible callout message.', 'Callout Title', true, 'primary');
                        echo $callout->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\callout;

$callout = new callout(
    \'This is a dismissible callout message.\',
    \'Callout Title\',
    true,
    \'primary\'
);
echo $callout->generate();') ?></code></div>
                </section>

                <!-- Collapse -->
                <section id="collapse" class="component-section">
                    <h2 class="section-title">Collapse</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\collapse;
                        use k1\lib\html\button as btn;

                        $trigger = new btn('Toggle Content', 'btn-primary');
                        $collapse_content = '<p>This is some collapsible content that reveals when you click the button above. It uses Bootstrap\'s collapse functionality.</p><p>You can put any HTML content here.</p>';
                        $collapse = new collapse('demo', $trigger, $collapse_content);
                        echo $trigger->generate() . ' ';
                        echo $collapse->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\collapse;
use k1\lib\html\button as btn;

$trigger = new btn(\'Toggle Content\', \'btn-primary\');
$collapse_content = \'<p>Your content here...</p>\';
$collapse = new collapse(\'demo\', $trigger, $collapse_content);
echo $trigger->generate() . \' \';
echo $collapse->generate();') ?></code></div>
                </section>

                <!-- Dropdown -->
                <section id="dropdown" class="component-section">
                    <h2 class="section-title">Dropdown</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\dropdown;

                        $dropdown = new dropdown('Actions', [
                            ['text' => 'Action', 'href' => '#'],
                            ['text' => 'Another Action', 'href' => '#'],
                            ['divider' => true],
                            ['text' => 'Separated Link', 'href' => '#']
                        ]);
                        echo $dropdown->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\dropdown;

$dropdown = new dropdown(\'Actions\', [
    [\'text\' => \'Action\', \'href\' => \'#\'],
    [\'text\' => \'Another Action\', \'href\' => \'#\'],
    [\'divider\' => true],
    [\'text\' => \'Separated Link\', \'href\' => \'#\']
]);
echo $dropdown->generate();') ?></code></div>
                </section>

                <!-- Grid -->
                <section id="grid" class="component-section">
                    <h2 class="section-title">Grid</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\grid;
                        use k1\lib\html\bootstrap\grid_cell;

                        $demo_grid = new grid(2, 3);
                        $row1 = $demo_grid->row(1);
                        $row1->general(4)->small(6)->medium(4);
                        $row1->get_child(0)->set_value('Row 1, Col 1');
                        $row1->get_child(1)->set_value('Row 1, Col 2');
                        $row1->get_child(2)->set_value('Row 1, Col 3');

                        $row2 = $demo_grid->row(2);
                        $row2->general(4)->small(6)->medium(4);
                        $row2->get_child(0)->set_value('Row 2, Col 1');
                        $row2->get_child(1)->set_value('Row 2, Col 2');
                        $row2->get_child(2)->set_value('Row 2, Col 3');

                        echo $demo_grid->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\grid;

$demo_grid = new grid(2, 3);
$row1 = $demo_grid->row(1);
$row1->general(4)->small(6)->medium(4);
$row1->get_child(0)->set_value(\'Row 1, Col 1\');

$row2 = $demo_grid->row(2);
$row2->general(4)->small(6)->medium(4);
$row2->get_child(0)->set_value(\'Row 2, Col 1\');

echo $demo_grid->generate();') ?></code></div>
                </section>

                <!-- List Group -->
                <section id="list-group" class="component-section">
                    <h2 class="section-title">List Group</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box" style="max-width: 400px;">
                        <?php
                        use k1\lib\html\bootstrap\list_group;

                        $list = new list_group([
                            ['text' => 'First item', 'href' => '#'],
                            ['text' => 'Second item', 'href' => '#', 'active' => true],
                            ['text' => 'Third item', 'href' => '#'],
                            ['text' => 'Disabled item', 'disabled' => true]
                        ]);
                        echo $list->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\list_group;

$list = new list_group([
    [\'text\' => \'First item\', \'href\' => \'#\'],
    [\'text\' => \'Second item\', \'href\' => \'#\', \'active\' => true],
    [\'text\' => \'Third item\', \'href\' => \'#\'],
    [\'text\' => \'Disabled item\', \'disabled\' => true]
]);
echo $list->generate();') ?></code></div>
                </section>

                <!-- Menu -->
                <section id="menu" class="component-section">
                    <h2 class="section-title">Menu</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\menu;

                        $demo_menu = new menu('dropdown');
                        $demo_menu->add_menu_item('#', 'Home');
                        $demo_menu->add_menu_item('#', 'About');
                        $li = $demo_menu->add_menu_item('#', 'Services');
                        $submenu = $demo_menu->add_sub_menu('#', 'More Services');
                        $submenu->add_menu_item('#', 'Service A');
                        $submenu->add_menu_item('#', 'Service B');
                        $demo_menu->add_menu_item('#', 'Contact');
                        echo $demo_menu->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\menu;

$demo_menu = new menu(\'dropdown\');
$demo_menu->add_menu_item(\'#\', \'Home\');
$demo_menu->add_menu_item(\'#\', \'About\');
$submenu = $demo_menu->add_sub_menu(\'#\', \'Services\');
$submenu->add_menu_item(\'#\', \'Service A\');
echo $demo_menu->generate();') ?></code></div>
                </section>

                <!-- Modal -->
                <section id="modal" class="component-section">
                    <h2 class="section-title">Modal</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\modal;
                        use k1\lib\html\button as btn;

                        $modal = new modal('Modal Title', '<p>This is the modal body content. You can put any HTML here.</p>', 'Cancel', 'Confirm');
                        echo $modal->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\modal;

$modal = new modal(
    \'Modal Title\',
    \'<p>This is the modal body content.</p>\',
    \'Cancel\',
    \'Confirm\'
);
echo $modal->generate();') ?></code></div>
                </section>

                <!-- Nav -->
                <section id="nav" class="component-section">
                    <h2 class="section-title">Nav</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\nav;

                        $demo_nav = new nav([
                            ['text' => 'Home', 'href' => '#', 'active' => true],
                            ['text' => 'Features', 'href' => '#'],
                            ['text' => 'Pricing', 'href' => '#'],
                            ['text' => 'Disabled', 'href' => '#', 'disabled' => true]
                        ], 'pills');
                        echo $demo_nav->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\nav;

$demo_nav = new nav([
    [\'text\' => \'Home\', \'href\' => \'#\', \'active\' => true],
    [\'text\' => \'Features\', \'href\' => \'#\'],
    [\'text\' => \'Pricing\', \'href\' => \'#\'],
], \'pills\');
echo $demo_nav->generate();') ?></code></div>
                </section>

                <!-- Navbar -->
                <section id="navbar" class="component-section">
                    <h2 class="section-title">Navbar</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\navbar;
                        use k1\lib\html\bootstrap\nav as nav_component;

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
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\navbar;
use k1\lib\html\bootstrap\nav as nav_component;

$demo_navbar = new navbar(\'Brand Name\', \'demoNav\', \'light\', \'lg\');
$nav_links = new nav_component([
    [\'text\' => \'Home\', \'href\' => \'#\', \'active\' => true],
    [\'text\' => \'Link\', \'href\' => \'#\'],
], \'nav\');
$demo_navbar->add_to_collapse($nav_links);
echo $demo_navbar->generate();') ?></code></div>
                </section>

                <!-- Pagination -->
                <section id="pagination" class="component-section">
                    <h2 class="section-title">Pagination</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\pagination;

                        $pager = new pagination(3, 10, '/page', true);
                        echo $pager->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\pagination;

$pager = new pagination(3, 10, \'/page\', true);
echo $pager->generate();') ?></code></div>
                </section>

                <!-- Progress -->
                <section id="progress" class="component-section">
                    <h2 class="section-title">Progress</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box progress-demo">
                        <?php
                        use k1\lib\html\bootstrap\progress;

                        $prog = new progress([
                            ['value' => 25, 'type' => 'primary'],
                            ['value' => 50, 'type' => 'success', 'striped' => true],
                            ['value' => 75, 'type' => 'warning', 'animated' => true],
                            ['value' => 100, 'type' => 'danger']
                        ], 20);
                        echo $prog->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\progress;

$prog = new progress([
    [\'value\' => 25, \'type\' => \'primary\'],
    [\'value\' => 50, \'type\' => \'success\', \'striped\' => true],
    [\'value\' => 75, \'type\' => \'warning\', \'animated\' => true],
    [\'value\' => 100, \'type\' => \'danger\']
], 20);
echo $prog->generate();') ?></code></div>
                </section>

                <!-- Spinner -->
                <section id="spinner" class="component-section">
                    <h2 class="section-title">Spinner</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box spinner-demo">
                        <?php
                        use k1\lib\html\bootstrap\spinner;

                        echo (new spinner('border', 'primary'))->generate() . ' ';
                        echo (new spinner('border', 'secondary'))->generate() . ' ';
                        echo (new spinner('border', 'success'))->generate() . ' ';
                        echo (new spinner('border', 'danger'))->generate() . ' ';
                        echo (new spinner('border', 'warning'))->generate() . ' ';
                        echo (new spinner('border', 'info'))->generate() . ' ';
                        echo '<br><br>';
                        echo (new spinner('grow', 'primary'))->generate() . ' ';
                        echo (new spinner('grow', 'secondary'))->generate() . ' ';
                        echo (new spinner('grow', 'success'))->generate() . ' ';
                        echo (new spinner('grow', 'danger'))->generate() . ' ';
                        echo (new spinner('grow', 'warning'))->generate() . ' ';
                        echo (new spinner('grow', 'info'))->generate() . ' ';
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\spinner;

// Border spinner
echo (new spinner(\'border\', \'primary\'))->generate();

// Grow spinner
echo (new spinner(\'grow\', \'success\'))->generate();') ?></code></div>
                </section>

                <!-- Table -->
                <section id="table" class="component-section">
                    <h2 class="section-title">Table</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\table_from_data;

                        $table = new table_from_data();
                        $table->set_data([
                            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
                            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Editor'],
                            ['id' => 3, 'name' => 'Bob Wilson', 'email' => 'bob@example.com', 'role' => 'User']
                        ]);
                        echo $table->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\table_from_data;

$table = new table_from_data();
$table->set_data([
    [\'id\' => 1, \'name\' => \'John Doe\', \'email\' => \'john@example.com\', \'role\' => \'Admin\'],
    [\'id\' => 2, \'name\' => \'Jane Smith\', \'email\' => \'jane@example.com\', \'role\' => \'Editor\'],
    [\'id\' => 3, \'name\' => \'Bob Wilson\', \'email\' => \'bob@example.com\', \'role\' => \'User\']
]);
echo $table->generate();') ?></code></div>
                </section>

                <!-- Toast -->
                <section id="toast" class="component-section">
                    <h2 class="section-title">Toast</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\toast;

                        $toast = new toast('Notification Header', 'This is the toast body message.', true, 5000);
                        echo $toast->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\toast;

$toast = new toast(
    \'Notification Header\',
    \'This is the toast body message.\',
    true,
    5000
);
echo $toast->generate();') ?></code></div>
                </section>

                <!-- Title Bar -->
                <section id="title-bar" class="component-section">
                    <h2 class="section-title">Title Bar</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\title_bar;

                        $title_bar = new title_bar('demo-title');
                        $title_bar->title()->set_value('Page Title');
                        echo $title_bar->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\title_bar;

$title_bar = new title_bar(\'demo-title\');
$title_bar->title()->set_value(\'Page Title\');
echo $title_bar->generate();') ?></code></div>
                </section>

                <!-- Top Bar -->
                <section id="top-bar" class="component-section">
                    <h2 class="section-title">Top Bar</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        use k1\lib\html\bootstrap\top_bar;

                        $top = new top_bar('main-top');
                        $top->title()->set_value('My Application');
                        $top->menu_left()->add_menu_item('#', 'Home');
                        $top->menu_left()->add_menu_item('#', 'About');
                        $top->menu_left()->add_menu_item('#', 'Services');
                        $top->menu_left()->add_menu_item('#', 'Contact');
                        echo $top->generate();
                        ?>
                    </div>
                    <div class="preview-label">Code</div>
                    <div class="code-block"><code><?php echo htmlspecialchars('<?php
use k1\lib\html\bootstrap\top_bar;

$top = new top_bar(\'main-top\');
$top->title()->set_value(\'My Application\');
$top->menu_left()->add_menu_item(\'#\', \'Home\');
$top->menu_left()->add_menu_item(\'#\', \'About\');
echo $top->generate();') ?></code></div>
                </section>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>