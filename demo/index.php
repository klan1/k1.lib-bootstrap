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
    <title>k1.lib-bootstrap // Components Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0d0d0d;
            --bg-secondary: #141414;
            --bg-tertiary: #1a1a1a;
            --bg-card: #111111;
            --border-color: #2a2a2a;
            --border-glow: #333333;
            --text-primary: #e8e8e8;
            --text-secondary: #888888;
            --text-muted: #555555;
            --accent-cyan: #00d4ff;
            --accent-amber: #ffb300;
            --accent-green: #39ff14;
            --accent-red: #ff3d3d;
            --accent-purple: #bf5af2;
            --syntax-keyword: #ff79c6;
            --syntax-string: #f1fa8c;
            --syntax-function: #50fa7b;
            --syntax-tag: #ff5555;
            --syntax-attr: #8be9fd;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            background: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'JetBrains Mono', monospace;
            font-size: 14px;
            line-height: 1.6;
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(ellipse at 20% 0%, rgba(0, 212, 255, 0.03) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 100%, rgba(191, 90, 242, 0.03) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        ::selection {
            background: var(--accent-cyan);
            color: var(--bg-primary);
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-glow);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }

        /* Header */
        .header {
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(20px);
        }

        .header-inner {
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-purple));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        }

        .logo-text {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(90deg, var(--text-primary), var(--accent-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo-text span {
            color: var(--text-muted);
            font-weight: 600;
        }

        .header-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.85rem;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: var(--accent-green);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent-green);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Main Layout */
        .main-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .sidebar-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .sidebar-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--text-muted);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-title::before {
            content: '';
            width: 8px;
            height: 8px;
            background: var(--accent-cyan);
            border-radius: 2px;
        }

        .nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .nav-item {
            opacity: 0;
            transform: translateX(-10px);
            animation: slideIn 0.4s ease forwards;
        }

        .nav-item:nth-child(1) { animation-delay: 0.05s; }
        .nav-item:nth-child(2) { animation-delay: 0.1s; }
        .nav-item:nth-child(3) { animation-delay: 0.15s; }
        .nav-item:nth-child(4) { animation-delay: 0.2s; }
        .nav-item:nth-child(5) { animation-delay: 0.25s; }
        .nav-item:nth-child(6) { animation-delay: 0.3s; }
        .nav-item:nth-child(7) { animation-delay: 0.35s; }
        .nav-item:nth-child(8) { animation-delay: 0.4s; }
        .nav-item:nth-child(9) { animation-delay: 0.45s; }
        .nav-item:nth-child(10) { animation-delay: 0.5s; }
        .nav-item:nth-child(11) { animation-delay: 0.55s; }
        .nav-item:nth-child(12) { animation-delay: 0.6s; }
        .nav-item:nth-child(13) { animation-delay: 0.65s; }
        .nav-item:nth-child(14) { animation-delay: 0.7s; }
        .nav-item:nth-child(15) { animation-delay: 0.75s; }
        .nav-item:nth-child(16) { animation-delay: 0.8s; }
        .nav-item:nth-child(17) { animation-delay: 0.85s; }
        .nav-item:nth-child(18) { animation-delay: 0.9s; }
        .nav-item:nth-child(19) { animation-delay: 0.95s; }
        .nav-item:nth-child(20) { animation-delay: 1s; }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.75rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            border: 1px solid transparent;
        }

        .nav-link:hover {
            color: var(--text-primary);
            background: var(--bg-tertiary);
            border-color: var(--border-color);
        }

        .nav-link.active {
            color: var(--accent-cyan);
            background: rgba(0, 212, 255, 0.08);
            border-color: rgba(0, 212, 255, 0.2);
        }

        .nav-link i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        /* Content */
        .content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Component Section */
        .component-section {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.6s ease forwards;
        }

        .component-section:nth-child(1) { animation-delay: 0.1s; }
        .component-section:nth-child(2) { animation-delay: 0.2s; }
        .component-section:nth-child(3) { animation-delay: 0.3s; }
        .component-section:nth-child(4) { animation-delay: 0.4s; }
        .component-section:nth-child(5) { animation-delay: 0.5s; }
        .component-section:nth-child(6) { animation-delay: 0.6s; }
        .component-section:nth-child(7) { animation-delay: 0.7s; }
        .component-section:nth-child(8) { animation-delay: 0.8s; }
        .component-section:nth-child(9) { animation-delay: 0.9s; }
        .component-section:nth-child(10) { animation-delay: 1s; }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .component-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
        }

        .component-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .component-title::before {
            content: '<';
            color: var(--accent-purple);
            font-weight: 400;
        }

        .component-title::after {
            content: '/>';
            color: var(--accent-cyan);
            font-weight: 400;
        }

        .component-badge {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 0.3rem 0.6rem;
            background: rgba(191, 90, 242, 0.15);
            color: var(--accent-purple);
            border: 1px solid rgba(191, 90, 242, 0.3);
            border-radius: 4px;
        }

        .component-body {
            padding: 1.5rem;
        }

        /* Preview Box */
        .preview-container {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
        }

        .preview-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-purple), var(--accent-amber));
        }

        .preview-label {
            position: absolute;
            top: 0.75rem;
            left: 1rem;
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--text-muted);
            background: var(--bg-primary);
            padding: 0 0.5rem;
        }

        .preview-label::before {
            content: '// ';
            color: var(--accent-green);
        }

        /* Code Block */
        .code-block {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
        }

        .code-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            background: var(--bg-tertiary);
            border-bottom: 1px solid var(--border-color);
        }

        .code-dots {
            display: flex;
            gap: 0.5rem;
        }

        .code-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .code-dot:nth-child(1) { background: #ff5f56; }
        .code-dot:nth-child(2) { background: #ffbd2e; }
        .code-dot:nth-child(3) { background: #27ca40; }

        .code-language {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .code-content {
            padding: 1.25rem;
            margin: 0;
            overflow-x: auto;
            font-size: 0.85rem;
            line-height: 1.7;
        }

        .code-content code {
            color: var(--text-primary);
            white-space: pre;
        }

        .code-keyword { color: var(--syntax-keyword); }
        .code-string { color: var(--syntax-string); }
        .code-function { color: var(--syntax-function); }
        .code-tag { color: var(--syntax-tag); }
        .code-attr { color: var(--syntax-attr); }
        .code-comment { color: var(--text-muted); font-style: italic; }

        /* Bootstrap overrides for component preview */
        .preview-box .btn {
            transition: all 0.2s ease;
        }

        .preview-box .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .preview-box .badge {
            font-weight: 500;
        }

        .preview-box .breadcrumb {
            background: transparent;
            padding: 0;
        }

        .preview-box .breadcrumb-item::before {
            color: var(--text-muted);
        }

        .preview-box .card {
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
        }

        .preview-box .card-header {
            background: var(--bg-tertiary);
            border-bottom: 1px solid var(--border-color);
        }

        .preview-box .list-group {
            background: transparent;
        }

        .preview-box .list-group-item {
            background: var(--bg-secondary);
            border-color: var(--border-color);
        }

        .preview-box .progress {
            background: var(--bg-tertiary);
        }

        .preview-box .table {
            color: var(--text-primary);
        }

        .preview-box .table th {
            background: var(--bg-tertiary);
            border-color: var(--border-color);
        }

        .preview-box .table td {
            border-color: var(--border-color);
        }

        .spinner-demo, .spinner-grow-demo {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            vertical-align: text-bottom;
        }

        .progress-demo .progress {
            margin-bottom: .5rem;
        }

        .badge-demo .badge {
            margin-right: .25rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .footer a {
            color: var(--accent-cyan);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer a:hover {
            color: var(--text-primary);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: relative;
                top: 0;
            }

            .nav-list {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .nav-link {
                padding: 0.5rem 0.75rem;
            }
        }

        @media (max-width: 640px) {
            .header-inner {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .main-container {
                padding: 1rem;
            }

            .component-header {
                flex-direction: column;
                gap: 0.75rem;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="logo">
                <div class="logo-icon">
                    <i class="bi bi-grid-3x3-gap"></i>
                </div>
                <div class="logo-text">k1.lib-bootstrap <span>// Components</span></div>
            </div>
            <div class="header-status">
                <span class="status-dot"></span>
                Bootstrap 5.3.8 Ready
            </div>
        </div>
    </header>

    <main class="main-container">
        <aside class="sidebar">
            <div class="sidebar-card">
                <div class="sidebar-title">Components</div>
                <ul class="nav-list">
                    <li class="nav-item"><a class="nav-link" href="#alert"><i class="bi bi-exclamation-triangle"></i> Alert</a></li>
                    <li class="nav-item"><a class="nav-link" href="#button"><i class="bi bi-square"></i> Button</a></li>
                    <li class="nav-item"><a class="nav-link" href="#badge"><i class="bi bi-bookmark"></i> Badge</a></li>
                    <li class="nav-item"><a class="nav-link" href="#breadcrumb"><i class="bi bi-chevron-double-right"></i> Breadcrumb</a></li>
                    <li class="nav-item"><a class="nav-link" href="#button-group"><i class="bi bi-square"></i> Button Group</a></li>
                    <li class="nav-item"><a class="nav-link" href="#card"><i class="bi bi-credit-card"></i> Card</a></li>
                    <li class="nav-item"><a class="nav-link" href="#callout"><i class="bi bi-chat-square"></i> Callout</a></li>
                    <li class="nav-item"><a class="nav-link" href="#collapse"><i class="bi bi-arrows-expand"></i> Collapse</a></li>
                    <li class="nav-item"><a class="nav-link" href="#dropdown"><i class="bi bi-caret-down-square"></i> Dropdown</a></li>
                    <li class="nav-item"><a class="nav-link" href="#grid"><i class="bi bi-grid"></i> Grid</a></li>
                    <li class="nav-item"><a class="nav-link" href="#list-group"><i class="bi bi-list-ul"></i> List Group</a></li>
                    <li class="nav-item"><a class="nav-link" href="#menu"><i class="bi bi-menu-button"></i> Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#modal"><i class="bi bi-window"></i> Modal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nav"><i class="bi bi-menu-app"></i> Nav</a></li>
                    <li class="nav-item"><a class="nav-link" href="#navbar"><i class="bi bi-navbar"></i> Navbar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pagination"><i class="bi bi-pagination"></i> Pagination</a></li>
                    <li class="nav-item"><a class="nav-link" href="#progress"><i class="bi bi-bar-chart"></i> Progress</a></li>
                    <li class="nav-item"><a class="nav-link" href="#spinner"><i class="bi bi-arrow-clockwise"></i> Spinner</a></li>
                    <li class="nav-item"><a class="nav-link" href="#table"><i class="bi bi-table"></i> Table</a></li>
                    <li class="nav-item"><a class="nav-link" href="#toast"><i class="bi bi-bell"></i> Toast</a></li>
                    <li class="nav-item"><a class="nav-link" href="#title-bar"><i class="bi bi-textarea"></i> Title Bar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#top-bar"><i class="bi bi-grip-horizontal"></i> Top Bar</a></li>
                </ul>
            </div>
        </aside>

        <div class="content">

            <!-- Alert -->
            <section id="alert" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Alert</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$demo_alert</span> = <span class="code-keyword">new</span> <span class="code-function">alert</span>(
    <span class="code-string">'This is a primary alert—check it out!'</span>,
    <span class="code-string">'primary'</span>,
    <span class="code-keyword">true</span>
);
<span class="code-function">$demo_alert</span>-><span class="code-function">set_heading</span>(<span class="code-string">'Important Message'</span>);
<span class="code-keyword">echo</span> <span class="code-function">$demo_alert</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Badge -->
            <section id="badge" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Badge</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <div class="badge-demo">
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
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">echo</span> (<span class="code-keyword">new</span> <span class="code-function">badge</span>(<span class="code-string">'Primary'</span>))-><span class="code-function">generate</span>() . <span class="code-string">' '</span>;
<span class="code-keyword">echo</span> (<span class="code-keyword">new</span> <span class="code-function">badge</span>(<span class="code-string">'Secondary'</span>, <span class="code-string">'secondary'</span>))-><span class="code-function">generate</span>() . <span class="code-string">' '</span>;
<span class="code-keyword">echo</span> (<span class="code-keyword">new</span> <span class="code-function">badge</span>(<span class="code-string">'Pill Badge'</span>, <span class="code-string">'primary'</span>, <span class="code-keyword">true</span>))-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Button -->
            <section id="button" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Button</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <div>
                            <h6 class="text-muted mb-2">Variants</h6>
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <?php
                                $variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link'];
                                foreach ($variants as $variant) {
                                    $v = constant("k1lib\\html\\bootstrap\\button::VARIANT_" . strtoupper($variant));
                                    echo (new button($variant, $v))->generate() . ' ';
                                }
                                ?>
                            </div>
                            <h6 class="text-muted mb-2">Outline Variants</h6>
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <?php
                                foreach ($variants as $variant) {
                                    if ($variant !== 'link') {
                                        $v = constant("k1lib\\html\\bootstrap\\button::VARIANT_" . strtoupper($variant));
                                        echo (new button($variant, $v, button::SIZE_MD, TRUE))->generate() . ' ';
                                    }
                                }
                                ?>
                            </div>
                            <h6 class="text-muted mb-2">Sizes</h6>
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-4">
                                <?php
                                echo (new button('Large', button::VARIANT_PRIMARY, button::SIZE_LG))->generate() . ' ';
                                echo (new button('Default', button::VARIANT_PRIMARY))->generate() . ' ';
                                echo (new button('Small', button::VARIANT_PRIMARY, button::SIZE_SM))->generate();
                                ?>
                            </div>
                            <h6 class="text-muted mb-2">States</h6>
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <?php
                                $disabled_btn = new button('Disabled', button::VARIANT_PRIMARY);
                                $disabled_btn->set_disabled();
                                echo $disabled_btn->generate() . ' ';

                                $active_btn = new button('Active', button::VARIANT_PRIMARY);
                                $active_btn->set_active();
                                echo $active_btn->generate() . ' ';

                                $toggle_btn = new button('Toggle Me', button::VARIANT_PRIMARY, button::SIZE_MD, TRUE);
                                $toggle_btn->set_toggle();
                                echo $toggle_btn->generate();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-comment">// Basic button</span>
<span class="code-keyword">$btn</span> = <span class="code-keyword">new</span> <span class="code-function">button</span>(<span class="code-string">'Click me'</span>, <span class="code-function">button</span>::<span class="code-function">VARIANT_PRIMARY</span>);

<span class="code-comment">// Outline variant</span>
<span class="code-keyword">$btn</span> = <span class="code-keyword">new</span> <span class="code-function">button</span>(<span class="code-string">'Outline'</span>, <span class="code-function">button</span>::<span class="code-function">VARIANT_PRIMARY</span>, <span class="code-function">button</span>::<span class="code-function">SIZE_MD</span>, <span class="code-keyword">true</span>);

<span class="code-comment">// Disabled state</span>
<span class="code-keyword">$btn</span> = <span class="code-keyword">new</span> <span class="code-function">button</span>(<span class="code-string">'Disabled'</span>);
<span class="code-function">$btn</span>-><span class="code-function">set_disabled</span>();

<span class="code-keyword">echo</span> <span class="code-function">$btn</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Breadcrumb -->
            <section id="breadcrumb" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Breadcrumb</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $bread = new breadcrumb([
                            ['text' => 'Home', 'href' => '#'],
                            ['text' => 'Library', 'href' => '#'],
                            ['text' => 'Data', 'href' => '#'],
                            ['text' => 'Current Page']
                        ]);
                        echo $bread->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$bread</span> = <span class="code-keyword">new</span> <span class="code-function">breadcrumb</span>([
    [<span class="code-string">'text'</span> => <span class="code-string">'Home'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Library'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Data'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Current Page'</span>]
]);
<span class="code-keyword">echo</span> <span class="code-function">$bread</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Button Group -->
            <section id="button-group" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Button Group</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $btn1 = new button('Left', button::VARIANT_PRIMARY);
                        $btn2 = new button('Center', button::VARIANT_PRIMARY);
                        $btn3 = new button('Right', button::VARIANT_PRIMARY);
                        $group = new button_group([$btn1, $btn2, $btn3]);
                        echo $group->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$btn1</span> = <span class="code-keyword">new</span> <span class="code-function">btn</span>(<span class="code-string">'Left'</span>, <span class="code-string">'btn-primary'</span>);
<span class="code-keyword">$btn2</span> = <span class="code-keyword">new</span> <span class="code-function">btn</span>(<span class="code-string">'Center'</span>, <span class="code-string">'btn-primary'</span>);
<span class="code-keyword">$btn3</span> = <span class="code-keyword">new</span> <span class="code-function">btn</span>(<span class="code-string">'Right'</span>, <span class="code-string">'btn-primary'</span>);

<span class="code-keyword">$group</span> = <span class="code-keyword">new</span> <span class="code-function">button_group</span>([<span class="code-function">$btn1</span>, <span class="code-function">$btn2</span>, <span class="code-function">$btn3</span>]);
<span class="code-keyword">echo</span> <span class="code-function">$group</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Card -->
            <section id="card" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Card</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $demo_card = new card('Card Title', 'Card Subtitle', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.');
                        $demo_card->body()->append_a('#', 'Go somewhere', 'btn btn-primary');
                        echo $demo_card->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$demo_card</span> = <span class="code-keyword">new</span> <span class="code-function">card</span>(
    <span class="code-string">'Card Title'</span>,
    <span class="code-string">'Card Subtitle'</span>,
    <span class="code-string">'Some quick example text...'</span>
);
<span class="code-function">$demo_card</span>-><span class="code-function">body</span>()-><span class="code-function">append_a</span>(<span class="code-string">'#'</span>, <span class="code-string">'Go somewhere'</span>, <span class="code-string">'btn btn-primary'</span>);
<span class="code-keyword">echo</span> <span class="code-function">$demo_card</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Callout -->
            <section id="callout" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Callout</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $callout = new callout('This is a dismissible callout message.', 'Callout Title', true, 'primary');
                        echo $callout->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$callout</span> = <span class="code-keyword">new</span> <span class="code-function">callout</span>(
    <span class="code-string">'This is a dismissible callout message.'</span>,
    <span class="code-string">'Callout Title'</span>,
    <span class="code-keyword">true</span>,
    <span class="code-string">'primary'</span>
);
<span class="code-keyword">echo</span> <span class="code-function">$callout</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Collapse -->
            <section id="collapse" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Collapse</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $trigger = new btn('Toggle Content', 'btn-primary');
                        $collapse_content = '<p>This is some collapsible content that reveals when you click the button above.</p>';
                        $collapse = new collapse('demo', $trigger, $collapse_content);
                        echo $trigger->generate() . ' ';
                        echo $collapse->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$trigger</span> = <span class="code-keyword">new</span> <span class="code-function">btn</span>(<span class="code-string">'Toggle Content'</span>, <span class="code-string">'btn-primary'</span>);
<span class="code-keyword">$collapse_content</span> = <span class="code-string">'<p>Your content here...</p>'</span>;
<span class="code-keyword">$collapse</span> = <span class="code-keyword">new</span> <span class="code-function">collapse</span>(<span class="code-string">'demo'</span>, <span class="code-function">$trigger</span>, <span class="code-function">$collapse_content</span>);
<span class="code-keyword">echo</span> <span class="code-function">$trigger</span>-><span class="code-function">generate</span>() . <span class="code-string">' '</span>;
<span class="code-keyword">echo</span> <span class="code-function">$collapse</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Dropdown -->
            <section id="dropdown" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Dropdown</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$dropdown</span> = <span class="code-keyword">new</span> <span class="code-function">dropdown</span>(<span class="code-string">'Actions'</span>, [
    [<span class="code-string">'text'</span> => <span class="code-string">'Action'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Another Action'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'divider'</span> => <span class="code-keyword">true</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Separated Link'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>]
]);
<span class="code-keyword">echo</span> <span class="code-function">$dropdown</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Grid -->
            <section id="grid" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Grid</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$demo_grid</span> = <span class="code-keyword">new</span> <span class="code-function">grid</span>(<span class="code-string">2</span>, <span class="code-string">3</span>);
<span class="code-keyword">$row1</span> = <span class="code-function">$demo_grid</span>-><span class="code-function">row</span>(<span class="code-string">1</span>);
<span class="code-function">$row1</span>-><span class="code-function">general</span>(<span class="code-string">4</span>)-><span class="code-function">small</span>(<span class="code-string">6</span>)-><span class="code-function">medium</span>(<span class="code-string">4</span>);
<span class="code-function">$row1</span>-><span class="code-function">get_child</span>(<span class="code-string">0</span>)-><span class="code-function">set_value</span>(<span class="code-string">'Row 1, Col 1'</span>);

<span class="code-keyword">$row2</span> = <span class="code-function">$demo_grid</span>-><span class="code-function">row</span>(<span class="code-string">2</span>);
<span class="code-function">$row2</span>-><span class="code-function">general</span>(<span class="code-string">4</span>)-><span class="code-function">small</span>(<span class="code-string">6</span>)-><span class="code-function">medium</span>(<span class="code-string">4</span>);
<span class="code-function">$row2</span>-><span class="code-function">get_child</span>(<span class="code-string">0</span>)-><span class="code-function">set_value</span>(<span class="code-string">'Row 2, Col 1'</span>);

<span class="code-keyword">echo</span> <span class="code-function">$demo_grid</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- List Group -->
            <section id="list-group" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">List Group</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$list</span> = <span class="code-keyword">new</span> <span class="code-function">list_group</span>([
    [<span class="code-string">'text'</span> => <span class="code-string">'First item'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Second item'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>, <span class="code-string">'active'</span> => <span class="code-keyword">true</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Third item'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Disabled item'</span>, <span class="code-string">'disabled'</span> => <span class="code-keyword">true</span>]
]);
<span class="code-keyword">echo</span> <span class="code-function">$list</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Menu -->
            <section id="menu" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Menu</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$demo_menu</span> = <span class="code-keyword">new</span> <span class="code-function">menu</span>(<span class="code-string">'dropdown'</span>);
<span class="code-function">$demo_menu</span>-><span class="code-function">add_menu_item</span>(<span class="code-string">'#'</span>, <span class="code-string">'Home'</span>);
<span class="code-function">$demo_menu</span>-><span class="code-function">add_menu_item</span>(<span class="code-string">'#'</span>, <span class="code-string">'About'</span>);
<span class="code-function">$demo_menu</span>-><span class="code-function">add_menu_item</span>(<span class="code-string">'#'</span>, <span class="code-string">'Services'</span>);
<span class="code-keyword">echo</span> <span class="code-function">$demo_menu</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Modal -->
            <section id="modal" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Modal</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $modal = new modal('Modal Title', '<p>This is the modal body content.</p>', 'Cancel', 'Confirm');
                        echo $modal->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$modal</span> = <span class="code-keyword">new</span> <span class="code-function">modal</span>(
    <span class="code-string">'Modal Title'</span>,
    <span class="code-string">'<p>This is the modal body content.</p>'</span>,
    <span class="code-string">'Cancel'</span>,
    <span class="code-string">'Confirm'</span>
);
<span class="code-keyword">echo</span> <span class="code-function">$modal</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Nav -->
            <section id="nav" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Nav</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$demo_nav</span> = <span class="code-keyword">new</span> <span class="code-function">nav</span>([
    [<span class="code-string">'text'</span> => <span class="code-string">'Home'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>, <span class="code-string">'active'</span> => <span class="code-keyword">true</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Features'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Pricing'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
], <span class="code-string">'pills'</span>);
<span class="code-keyword">echo</span> <span class="code-function">$demo_nav</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Navbar -->
            <section id="navbar" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Navbar</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$demo_navbar</span> = <span class="code-keyword">new</span> <span class="code-function">navbar</span>(<span class="code-string">'Brand Name'</span>, <span class="code-string">'demoNav'</span>, <span class="code-string">'light'</span>, <span class="code-string">'lg'</span>);
<span class="code-keyword">$nav_links</span> = <span class="code-keyword">new</span> <span class="code-function">nav</span>([
    [<span class="code-string">'text'</span> => <span class="code-string">'Home'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>, <span class="code-string">'active'</span> => <span class="code-keyword">true</span>],
    [<span class="code-string">'text'</span> => <span class="code-string">'Link'</span>, <span class="code-string">'href'</span> => <span class="code-string">'#'</span>],
], <span class="code-string">'nav'</span>);
<span class="code-function">$demo_navbar</span>-><span class="code-function">add_to_collapse</span>(<span class="code-function">$nav_links</span>);
<span class="code-keyword">echo</span> <span class="code-function">$demo_navbar</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Pagination -->
            <section id="pagination" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Pagination</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $pager = new pagination(3, 10, '/page', true);
                        echo $pager->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$pager</span> = <span class="code-keyword">new</span> <span class="code-function">pagination</span>(<span class="code-string">3</span>, <span class="code-string">10</span>, <span class="code-string">'/page'</span>, <span class="code-keyword">true</span>);
<span class="code-keyword">echo</span> <span class="code-function">$pager</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Progress -->
            <section id="progress" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Progress</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <div class="progress-demo">
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
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$prog</span> = <span class="code-keyword">new</span> <span class="code-function">progress</span>([
    [<span class="code-string">'value'</span> => <span class="code-string">25</span>, <span class="code-string">'type'</span> => <span class="code-string">'primary'</span>],
    [<span class="code-string">'value'</span> => <span class="code-string">50</span>, <span class="code-string">'type'</span> => <span class="code-string">'success'</span>, <span class="code-string">'striped'</span> => <span class="code-keyword">true</span>],
    [<span class="code-string">'value'</span> => <span class="code-string">75</span>, <span class="code-string">'type'</span> => <span class="code-string">'warning'</span>, <span class="code-string">'animated'</span> => <span class="code-keyword">true</span>],
    [<span class="code-string">'value'</span> => <span class="code-string">100</span>, <span class="code-string">'type'</span> => <span class="code-string">'danger'</span>]
], <span class="code-string">20</span>);
<span class="code-keyword">echo</span> <span class="code-function">$prog</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Spinner -->
            <section id="spinner" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Spinner</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <div class="spinner-demo">
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
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-comment">// Border spinner</span>
<span class="code-keyword">echo</span> (<span class="code-keyword">new</span> <span class="code-function">spinner</span>(<span class="code-string">'border'</span>, <span class="code-string">'primary'</span>))-><span class="code-function">generate</span>();

<span class="code-comment">// Grow spinner</span>
<span class="code-keyword">echo</span> (<span class="code-keyword">new</span> <span class="code-function">spinner</span>(<span class="code-string">'grow'</span>, <span class="code-string">'success'</span>))-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Table -->
            <section id="table" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Table</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$table</span> = <span class="code-keyword">new</span> <span class="code-function">table_from_data</span>();
<span class="code-function">$table</span>-><span class="code-function">set_data</span>([
    [<span class="code-string">'id'</span> => <span class="code-string">1</span>, <span class="code-string">'name'</span> => <span class="code-string">'John Doe'</span>, <span class="code-string">'email'</span> => <span class="code-string">'john@example.com'</span>, <span class="code-string">'role'</span> => <span class="code-string">'Admin'</span>],
    [<span class="code-string">'id'</span> => <span class="code-string">2</span>, <span class="code-string">'name'</span> => <span class="code-string">'Jane Smith'</span>, <span class="code-string">'email'</span> => <span class="code-string">'jane@example.com'</span>, <span class="code-string">'role'</span> => <span class="code-string">'Editor'</span>],
    [<span class="code-string">'id'</span> => <span class="code-string">3</span>, <span class="code-string">'name'</span> => <span class="code-string">'Bob Wilson'</span>, <span class="code-string">'email'</span> => <span class="code-string">'bob@example.com'</span>, <span class="code-string">'role'</span> => <span class="code-string">'User'</span>]
]);
<span class="code-keyword">echo</span> <span class="code-function">$table</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Toast -->
            <section id="toast" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Toast</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $toast = new toast('Notification Header', 'This is the toast body message.', true, 5000);
                        echo $toast->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$toast</span> = <span class="code-keyword">new</span> <span class="code-function">toast</span>(
    <span class="code-string">'Notification Header'</span>,
    <span class="code-string">'This is the toast body message.'</span>,
    <span class="code-keyword">true</span>,
    <span class="code-string">5000</span>
);
<span class="code-keyword">echo</span> <span class="code-function">$toast</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Title Bar -->
            <section id="title-bar" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Title Bar</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
                        <?php
                        $title_bar = new title_bar('demo-title');
                        $title_bar->title()->set_value('Page Title');
                        echo $title_bar->generate();
                        ?>
                    </div>
                    <div class="code-block">
                        <div class="code-header">
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$title_bar</span> = <span class="code-keyword">new</span> <span class="code-function">title_bar</span>(<span class="code-string">'demo-title'</span>);
<span class="code-function">$title_bar</span>-><span class="code-function">title</span>()-><span class="code-function">set_value</span>(<span class="code-string">'Page Title'</span>);
<span class="code-keyword">echo</span> <span class="code-function">$title_bar</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

            <!-- Top Bar -->
            <section id="top-bar" class="component-section">
                <div class="component-header">
                    <h2 class="component-title">Top Bar</h2>
                    <span class="component-badge">BETA</span>
                </div>
                <div class="component-body">
                    <div class="preview-container">
                        <span class="preview-label">Preview</span>
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
                            <div class="code-dots">
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                                <span class="code-dot"></span>
                            </div>
                            <span class="code-language">PHP</span>
                        </div>
                        <pre class="code-content"><code><span class="code-keyword">$top</span> = <span class="code-keyword">new</span> <span class="code-function">top_bar</span>(<span class="code-string">'main-top'</span>);
<span class="code-function">$top</span>-><span class="code-function">title</span>()-><span class="code-function">set_value</span>(<span class="code-string">'My Application'</span>);
<span class="code-function">$top</span>-><span class="code-function">menu_left</span>()-><span class="code-function">add_menu_item</span>(<span class="code-string">'#'</span>, <span class="code-string">'Home'</span>);
<span class="code-function">$top</span>-><span class="code-function">menu_left</span>()-><span class="code-function">add_menu_item</span>(<span class="code-string">'#'</span>, <span class="code-string">'About'</span>);
<span class="code-keyword">echo</span> <span class="code-function">$top</span>-><span class="code-function">generate</span>();</code></pre>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <footer class="footer">
        <p><a href="https://github.com/klan1/k1.lib-bootstrap">k1.lib-bootstrap</a> — Bootstrap 5 Components Library</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>