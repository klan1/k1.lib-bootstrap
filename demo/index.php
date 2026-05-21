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

use k1lib\html\bootstrap\alert;
use k1lib\html\bootstrap\badge;
use k1lib\html\bootstrap\breadcrumb;
use k1lib\html\bootstrap\button;
use k1lib\html\bootstrap\button_group;
use k1lib\html\bootstrap\card;
use k1lib\html\bootstrap\callout;
use k1lib\html\bootstrap\collapse;
use k1lib\html\bootstrap\dropdown;
use k1lib\html\bootstrap\grid;
use k1lib\html\bootstrap\grid_cell;
use k1lib\html\bootstrap\list_group;
use k1lib\html\bootstrap\menu;
use k1lib\html\bootstrap\modal;
use k1lib\html\bootstrap\nav as nav_component;
use k1lib\html\bootstrap\navbar;
use k1lib\html\bootstrap\pagination;
use k1lib\html\bootstrap\progress;
use k1lib\html\bootstrap\spinner;
use k1lib\html\bootstrap\table_from_data;
use k1lib\html\bootstrap\toast;
use k1lib\html\bootstrap\title_bar;
use k1lib\html\bootstrap\top_bar;
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
        :root {
            --bs-body-bg: #f8f9fa;
        }

        body {
            padding-top: 70px;
            background-color: var(--bs-body-bg);
        }

        .component-section {
            background: #fff;
            border-radius: .5rem;
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        }

        .component-title {
            color: #212529;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: .75rem;
            border-bottom: 2px solid #0d6efd;
        }

        .preview-box {
            min-height: 80px;
            border: 1px solid #dee2e6;
            border-radius: .375rem;
            padding: 1rem;
            margin-bottom: 1rem;
            background: #fff;
        }

        .code-block {
            background: #212529;
            border-radius: .375rem;
            overflow: hidden;
        }

        .code-header {
            background: #343a40;
            padding: .5rem 1rem;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .code-dots span {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
        }

        .code-dots span:nth-child(1) { background: #ff5f56; }
        .code-dots span:nth-child(2) { background: #ffbd2e; }
        .code-dots span:nth-child(3) { background: #27ca40; }

        .code-content {
            padding: 1rem;
            margin: 0;
            overflow-x: auto;
            font-size: .85rem;
            line-height: 1.5;
        }

        .code-content code {
            color: #f8f8f2;
            white-space: pre;
        }

        .nav-sticky {
            top: 80px;
        }

        .nav-link.active {
            background-color: #0d6efd !important;
            color: #fff !important;
        }

        h2.section-title {
            border-bottom: 2px solid #0d6efd;
            padding-bottom: .5rem;
            margin-bottom: 1.5rem;
        }

        .badge-demo .badge {
            margin-right: .25rem;
        }

        .spinner-demo > div {
            display: inline-block !important;
            margin-right: .5rem;
        }

        .progress-demo .progress {
            margin-bottom: .5rem;
        }

        .preview-label {
            font-size: .75rem;
            text-transform: uppercase;
            color: #6c757d;
            margin-bottom: .5rem;
            font-weight: 600;
            letter-spacing: .05em;
        }

        .component-badge {
            font-size: .65rem;
            padding: .25rem .5rem;
            background: #e9ecef;
            color: #6c757d;
            border-radius: .25rem;
        }

        .card-demo {
            max-width: 400px;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#componentNav">
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-grid-3x3-gap me-2"></i> k1.lib-bootstrap
            </a>
            <span class="navbar-text text-white-50">Bootstrap 5 Components</span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav id="componentNav" class="nav flex-column nav-pills nav-sticky card p-3 mb-3" style="position: sticky; top: 80px;">
                    <span class="nav-link text-muted mb-2" style="font-size: .75rem; text-transform: uppercase;">Components</span>
                    <a class="nav-link" href="#button">Button</a>
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

                <!-- Button -->
                <section id="button" class="component-section">
                    <h2 class="component-title">Button</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <div>
                            <h6 class="mb-2 text-muted">Variants</h6>
                            <div class="mb-3">
                                <?php
                                $variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link'];
                                foreach ($variants as $variant) {
                                    $v = constant("k1lib\\html\\bootstrap\\button::VARIANT_" . strtoupper($variant));
                                    echo (new button(ucfirst($variant), $v))->generate() . ' ';
                                }
                                ?>
                            </div>
                            <h6 class="mb-2 text-muted">Outline</h6>
                            <div class="mb-3">
                                <?php
                                foreach ($variants as $variant) {
                                    if ($variant !== 'link') {
                                        $v = constant("k1lib\\html\\bootstrap\\button::VARIANT_" . strtoupper($variant));
                                        echo (new button(ucfirst($variant), $v, button::SIZE_MD, TRUE))->generate() . ' ';
                                    }
                                }
                                ?>
                            </div>
                            <h6 class="mb-2 text-muted">Sizes</h6>
                            <div class="mb-3">
                                <?php
                                echo (new button('Large', button::VARIANT_PRIMARY, button::SIZE_LG))->generate() . ' ';
                                echo (new button('Default', button::VARIANT_PRIMARY))->generate() . ' ';
                                echo (new button('Small', button::VARIANT_PRIMARY, button::SIZE_SM))->generate();
                                ?>
                            </div>
                            <h6 class="mb-2 text-muted">States</h6>
                            <div class="mb-3">
                                <?php
                                $disabled_btn = new button('Disabled', button::VARIANT_PRIMARY);
                                $disabled_btn->set_disabled();
                                echo $disabled_btn->generate() . ' ';

                                $active_btn = new button('Active', button::VARIANT_PRIMARY);
                                $active_btn->set_active();
                                echo $active_btn->generate() . ' ';

                                $toggle_btn = new button('Toggle', button::VARIANT_PRIMARY, button::SIZE_MD, TRUE);
                                $toggle_btn->set_toggle();
                                echo $toggle_btn->generate();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-primary">// Basic button</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> button(<span class="text-success">'Click me'</span>, button::<span class="text-light">VARIANT_PRIMARY</span>);

<span class="text-primary">// Outline variant</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> button(<span class="text-success">'Outline'</span>, button::<span class="text-light">VARIANT_PRIMARY</span>, button::<span class="text-light">SIZE_MD</span>, <span class="text-info">true</span>);

<span class="text-primary">// Disabled state</span>
<span class="text-warning">$btn</span> = <span class="text-info">new</span> button(<span class="text-success">'Disabled'</span>);
<span class="text-warning">$btn</span>-><span class="text-light">set_disabled</span>();

<span class="text-warning">echo</span> <span class="text-warning">$btn</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Alert -->
                <section id="alert" class="component-section">
                    <h2 class="component-title">Alert</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $types = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
                        foreach ($types as $type) {
                            $a = new alert("A simple {$type} alert—check it out!", $type, true);
                            echo $a->generate();
                        }
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$alert</span> = <span class="text-info">new</span> alert(<span class="text-success">'This is an alert!'</span>, <span class="text-success">'primary'</span>, <span class="text-info">true</span>);
<span class="text-warning">echo</span> <span class="text-warning">$alert</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Badge -->
                <section id="badge" class="component-section">
                    <h2 class="component-title">Badge</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box badge-demo">
                        <?php
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
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">echo</span> (<span class="text-info">new</span> badge(<span class="text-success">'Primary'</span>))-><span class="text-light">generate</span>() . <span class="text-success">' '</span>;
<span class="text-warning">echo</span> (<span class="text-info">new</span> badge(<span class="text-success">'Secondary'</span>, <span class="text-success">'secondary'</span>))-><span class="text-light">generate</span>();
<span class="text-warning">echo</span> (<span class="text-info">new</span> badge(<span class="text-success">'Pill'</span>, <span class="text-success">'primary'</span>, <span class="text-info">true</span>))-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Breadcrumb -->
                <section id="breadcrumb" class="component-section">
                    <h2 class="component-title">Breadcrumb</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $bread = new breadcrumb();
                        $bread->add_item('Home', '#')
                              ->add_item('Library', '#')
                              ->add_item('Data', '#')
                              ->add_item('Current Page');
                        echo $bread->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$bread</span> = <span class="text-info">new</span> breadcrumb();
<span class="text-warning">$bread</span>-><span class="text-light">add_item</span>(<span class="text-success">'Home'</span>, <span class="text-success">'#'</span>)
      -><span class="text-light">add_item</span>(<span class="text-success">'Library'</span>, <span class="text-success">'#'</span>)
      -><span class="text-light">add_item</span>(<span class="text-success">'Current Page'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$bread</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Button Group -->
                <section id="button-group" class="component-section">
                    <h2 class="component-title">Button Group</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <div>
                            <h6 class="mb-2 text-muted">Basic</h6>
                            <?php
                            $group = new button_group();
                            $group->add_button(new button('Left', button::VARIANT_PRIMARY))
                                  ->add_button(new button('Center', button::VARIANT_PRIMARY))
                                  ->add_button(new button('Right', button::VARIANT_PRIMARY));
                            echo $group->generate();
                            ?>
                            <h6 class="mb-2 mt-3 text-muted">Sizes</h6>
                            <?php
                            $group_sm = new button_group('sm');
                            $group_sm->add_button(new button('Small', button::VARIANT_SECONDARY))
                                     ->add_button(new button('Small', button::VARIANT_SECONDARY));
                            echo $group_sm->generate() . ' ';
                            $group_lg = new button_group('lg');
                            $group_lg->add_button(new button('Large', button::VARIANT_SECONDARY))
                                     ->add_button(new button('Large', button::VARIANT_SECONDARY));
                            echo $group_lg->generate();
                            ?>
                            <h6 class="mb-2 mt-3 text-muted">Vertical</h6>
                            <?php
                            $group_v = new button_group('md', TRUE);
                            $group_v->add_button(new button('Top', button::VARIANT_INFO))
                                     ->add_button(new button('Middle', button::VARIANT_INFO))
                                     ->add_button(new button('Bottom', button::VARIANT_INFO));
                            echo $group_v->generate();
                            ?>
                        </div>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-primary">// Basic group</span>
<span class="text-warning">$group</span> = <span class="text-info">new</span> button_group();
<span class="text-warning">$group</span>-><span class="text-light">add_button</span>(<span class="text-info">new</span> button(<span class="text-success">'Left'</span>, button::<span class="text-light">VARIANT_PRIMARY</span>))
      -><span class="text-light">add_button</span>(<span class="text-info">new</span> button(<span class="text-success">'Center'</span>, button::<span class="text-light">VARIANT_PRIMARY</span>))
      -><span class="text-light">add_button</span>(<span class="text-info">new</span> button(<span class="text-success">'Right'</span>, button::<span class="text-light">VARIANT_PRIMARY</span>));

<span class="text-primary">// Access buttons</span>
<span class="text-warning">$group</span>-><span class="text-light">button</span>(<span class="text-info">0</span>); <span class="text-secondary">// Returns first button</span></code></pre>
                    </div>
                </section>

                <!-- Card -->
                <section id="card" class="component-section">
                    <h2 class="component-title">Card</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box card-demo">
                        <?php
                        $demo_card = new card('Card Title', 'Card Subtitle', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.');
                        $demo_card->body()->append_child(new button('Go somewhere', button::VARIANT_PRIMARY));
                        echo $demo_card->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$card</span> = <span class="text-info">new</span> card(
    <span class="text-success">'Card Title'</span>,
    <span class="text-success">'Card Subtitle'</span>,
    <span class="text-success">'Card content text'</span>
);
<span class="text-warning">$card</span>-><span class="text-light">body</span>()-><span class="text-light">append_child</span>(
    <span class="text-info">new</span> button(<span class="text-success">'Go somewhere'</span>, button::<span class="text-light">VARIANT_PRIMARY</span>)
);
<span class="text-warning">echo</span> <span class="text-warning">$card</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Callout -->
                <section id="callout" class="component-section">
                    <h2 class="component-title">Callout</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $callout = new callout('This is a dismissible callout message.', 'Callout Title', true, 'primary');
                        echo $callout->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$callout</span> = <span class="text-info">new</span> callout(
    <span class="text-success">'This is a callout message.'</span>,
    <span class="text-success">'Callout Title'</span>,
    <span class="text-info">true</span>,
    <span class="text-success">'primary'</span>
);
<span class="text-warning">echo</span> <span class="text-warning">$callout</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Collapse -->
                <section id="collapse" class="component-section">
                    <h2 class="component-title">Collapse</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $trigger = new button('Toggle Content', button::VARIANT_PRIMARY);
                        $collapse_content = '<p>This is collapsible content.</p>';
                        $collapse = new collapse('demo', $trigger, $collapse_content);
                        echo $trigger->generate() . ' ';
                        echo $collapse->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$trigger</span> = <span class="text-info">new</span> button(<span class="text-success">'Toggle'</span>, button::<span class="text-light">VARIANT_PRIMARY</span>);
<span class="text-warning">$collapse</span> = <span class="text-info">new</span> collapse(<span class="text-success">'demo'</span>, <span class="text-warning">$trigger</span>, <span class="text-success">'<p>Content</p>'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$collapse</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Dropdown -->
                <section id="dropdown" class="component-section">
                    <h2 class="component-title">Dropdown</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $dropdown = new dropdown('Actions', [
                            ['text' => 'Action', 'href' => '#'],
                            ['text' => 'Another Action', 'href' => '#'],
                            ['divider' => true],
                            ['text' => 'Separated Link', 'href' => '#']
                        ]);
                        echo $dropdown->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$dropdown</span> = <span class="text-info">new</span> dropdown(<span class="text-success">'Actions'</span>, [
    [<span class="text-success">'text'</span> => <span class="text-success">'Action'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>],
    [<span class="text-success">'divider'</span> => <span class="text-info">true</span>],
    [<span class="text-success">'text'</span> => <span class="text-success">'Separated'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>]
]);
<span class="text-warning">echo</span> <span class="text-warning">$dropdown</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Grid -->
                <section id="grid" class="component-section">
                    <h2 class="component-title">Grid</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
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
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$grid</span> = <span class="text-info">new</span> grid(<span class="text-info">2</span>, <span class="text-info">3</span>);
<span class="text-warning">$row1</span> = <span class="text-warning">$grid</span>-><span class="text-light">row</span>(<span class="text-info">1</span>);
<span class="text-warning">$row1</span>-><span class="text-light">general</span>(<span class="text-info">4</span>)-><span class="text-light">small</span>(<span class="text-info">6</span>);
<span class="text-warning">$row1</span>-><span class="text-light">get_child</span>(<span class="text-info">0</span>)-><span class="text-light">set_value</span>(<span class="text-success">'Col 1'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$grid</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- List Group -->
                <section id="list-group" class="component-section">
                    <h2 class="component-title">List Group</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box card-demo">
                        <?php
                        $list = new list_group([
                            ['text' => 'First item', 'href' => '#'],
                            ['text' => 'Second item', 'href' => '#', 'active' => true],
                            ['text' => 'Third item', 'href' => '#'],
                            ['text' => 'Disabled item', 'disabled' => true]
                        ]);
                        echo $list->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$list</span> = <span class="text-info">new</span> list_group([
    [<span class="text-success">'text'</span> => <span class="text-success">'First item'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>],
    [<span class="text-success">'text'</span> => <span class="text-success">'Second'</span>, <span class="text-success">'active'</span> => <span class="text-info">true</span>],
    [<span class="text-success">'text'</span> => <span class="text-success">'Third'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>]
]);
<span class="text-warning">echo</span> <span class="text-warning">$list</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Menu -->
                <section id="menu" class="component-section">
                    <h2 class="component-title">Menu</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $demo_menu = new menu('dropdown');
                        $demo_menu->add_menu_item('#', 'Home');
                        $demo_menu->add_menu_item('#', 'About');
                        $demo_menu->add_menu_item('#', 'Services');
                        $demo_menu->add_menu_item('#', 'Contact');
                        echo $demo_menu->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$menu</span> = <span class="text-info">new</span> menu(<span class="text-success">'dropdown'</span>);
<span class="text-warning">$menu</span>-><span class="text-light">add_menu_item</span>(<span class="text-success">'#'</span>, <span class="text-success">'Home'</span>);
<span class="text-warning">$menu</span>-><span class="text-light">add_menu_item</span>(<span class="text-success">'#'</span>, <span class="text-success">'About'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$menu</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Modal -->
                <section id="modal" class="component-section">
                    <h2 class="component-title">Modal</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $modal = new modal('Modal Title', '<p>This is the modal body content.</p>', 'Cancel', 'Confirm');
                        echo $modal->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$modal</span> = <span class="text-info">new</span> modal(
    <span class="text-success">'Modal Title'</span>,
    <span class="text-success">'<p>Content</p>'</span>,
    <span class="text-success">'Cancel'</span>,
    <span class="text-success">'Confirm'</span>
);
<span class="text-warning">echo</span> <span class="text-warning">$modal</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Nav -->
                <section id="nav" class="component-section">
                    <h2 class="component-title">Nav</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $demo_nav = new nav_component([
                            ['text' => 'Home', 'href' => '#', 'active' => true],
                            ['text' => 'Features', 'href' => '#'],
                            ['text' => 'Pricing', 'href' => '#'],
                            ['text' => 'Disabled', 'href' => '#', 'disabled' => true]
                        ], 'pills');
                        echo $demo_nav->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$nav</span> = <span class="text-info">new</span> nav([
    [<span class="text-success">'text'</span> => <span class="text-success">'Home'</span>, <span class="text-success">'active'</span> => <span class="text-info">true</span>],
    [<span class="text-success">'text'</span> => <span class="text-success">'Features'</span>, <span class="text-success">'href'</span> => <span class="text-success">'#'</span>]
], <span class="text-success">'pills'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$nav</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Navbar -->
                <section id="navbar" class="component-section">
                    <h2 class="component-title">Navbar</h2>
                    <div class="preview-label">Preview</div>
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
                        <pre class="code-content"><code><span class="text-warning">$navbar</span> = <span class="text-info">new</span> navbar(<span class="text-success">'Brand'</span>, <span class="text-success">'demoNav'</span>, <span class="text-success">'light'</span>);
<span class="text-warning">$nav</span> = <span class="text-info">new</span> nav([...], <span class="text-success">'nav'</span>);
<span class="text-warning">$navbar</span>-><span class="text-light">add_to_collapse</span>(<span class="text-warning">$nav</span>);
<span class="text-warning">echo</span> <span class="text-warning">$navbar</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Pagination -->
                <section id="pagination" class="component-section">
                    <h2 class="component-title">Pagination</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $pager = new pagination(3, 10, '/page', true);
                        echo $pager->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$pager</span> = <span class="text-info">new</span> pagination(<span class="text-info">3</span>, <span class="text-info">10</span>, <span class="text-success">'/page'</span>, <span class="text-info">true</span>);
<span class="text-warning">echo</span> <span class="text-warning">$pager</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Progress -->
                <section id="progress" class="component-section">
                    <h2 class="component-title">Progress</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box progress-demo">
                        <?php
                        $prog = new progress([
                            ['value' => 25, 'type' => 'primary'],
                            ['value' => 50, 'type' => 'success', 'striped' => true],
                            ['value' => 75, 'type' => 'warning', 'animated' => true],
                            ['value' => 100, 'type' => 'danger']
                        ], 20);
                        echo $prog->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$prog</span> = <span class="text-info">new</span> progress([
    [<span class="text-success">'value'</span> => <span class="text-info">25</span>, <span class="text-success">'type'</span> => <span class="text-success">'primary'</span>],
    [<span class="text-success">'value'</span> => <span class="text-info">50</span>, <span class="text-success">'striped'</span> => <span class="text-info">true</span>]
], <span class="text-info">20</span>);
<span class="text-warning">echo</span> <span class="text-warning">$prog</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Spinner -->
                <section id="spinner" class="component-section">
                    <h2 class="component-title">Spinner</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box spinner-demo">
                        <?php
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
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-primary">// Border spinner</span>
<span class="text-warning">echo</span> (<span class="text-info">new</span> spinner(<span class="text-success">'border'</span>, <span class="text-success">'primary'</span>))-><span class="text-light">generate</span>();

<span class="text-primary">// Grow spinner</span>
<span class="text-warning">echo</span> (<span class="text-info">new</span> spinner(<span class="text-success">'grow'</span>, <span class="text-success">'success'</span>))-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Table -->
                <section id="table" class="component-section">
                    <h2 class="component-title">Table</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $table = new table_from_data();
                        $table->set_data([
                            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
                            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Editor'],
                            ['id' => 3, 'name' => 'Bob Wilson', 'email' => 'bob@example.com', 'role' => 'User']
                        ]);
                        echo $table->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$table</span> = <span class="text-info">new</span> table_from_data();
<span class="text-warning">$table</span>-><span class="text-light">set_data</span>([
    [<span class="text-success">'id'</span> => <span class="text-info">1</span>, <span class="text-success">'name'</span> => <span class="text-success">'John'</span>],
    [<span class="text-success">'id'</span> => <span class="text-info">2</span>, <span class="text-success">'name'</span> => <span class="text-success">'Jane'</span>]
]);
<span class="text-warning">echo</span> <span class="text-warning">$table</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Toast -->
                <section id="toast" class="component-section">
                    <h2 class="component-title">Toast</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $toast = new toast('Notification Header', 'This is the toast body message.', true, 5000);
                        echo $toast->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$toast</span> = <span class="text-info">new</span> toast(
    <span class="text-success">'Header'</span>,
    <span class="text-success">'Body message'</span>,
    <span class="text-info">true</span>,
    <span class="text-info">5000</span>
);
<span class="text-warning">echo</span> <span class="text-warning">$toast</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Title Bar -->
                <section id="title-bar" class="component-section">
                    <h2 class="component-title">Title Bar</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $title_bar = new title_bar('demo-title');
                        $title_bar->title()->set_value('Page Title');
                        echo $title_bar->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$title</span> = <span class="text-info">new</span> title_bar(<span class="text-success">'demo'</span>);
<span class="text-warning">$title</span>-><span class="text-light">title</span>()-><span class="text-light">set_value</span>(<span class="text-success">'Page Title'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$title</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

                <!-- Top Bar -->
                <section id="top-bar" class="component-section">
                    <h2 class="component-title">Top Bar</h2>
                    <div class="preview-label">Preview</div>
                    <div class="preview-box">
                        <?php
                        $top = new top_bar('main-top');
                        $top->title()->set_value('My Application');
                        $top->menu_left()->add_menu_item('#', 'Home');
                        $top->menu_left()->add_menu_item('#', 'About');
                        $top->menu_left()->add_menu_item('#', 'Services');
                        $top->menu_left()->add_menu_item('#', 'Contact');
                        echo $top->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots"><span></span><span></span><span></span></div>
                            <span class="text-white-50 ms-2" style="font-size: .75rem;">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="text-warning">$top</span> = <span class="text-info">new</span> top_bar(<span class="text-success">'main'</span>);
<span class="text-warning">$top</span>-><span class="text-light">title</span>()-><span class="text-light">set_value</span>(<span class="text-success">'My App'</span>);
<span class="text-warning">$top</span>-><span class="text-light">menu_left</span>()-><span class="text-light">add_menu_item</span>(<span class="text-success">'#'</span>, <span class="text-success">'Home'</span>);
<span class="text-warning">echo</span> <span class="text-warning">$top</span>-><span class="text-light">generate</span>();</code></pre>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>