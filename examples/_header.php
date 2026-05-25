<?php
/**
 * Bootstrap 5 Components Showcase - Individual Component Examples
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
use k1lib\html\bootstrap\modal;
use k1lib\html\componentes\nav as nav_component;
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
    <title><?= $component_name ?? 'Component' ?> - k1.lib-bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root { --bs-body-bg: #f8f9fa; }
        body { padding-top: 70px; background-color: var(--bs-body-bg); }
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
        .code-block { background: #212529; border-radius: .375rem; overflow: hidden; }
        .code-header {
            background: #343a40;
            padding: .5rem 1rem;
            display: flex;
            align-items: center;
            gap: .5rem;
        }
        .code-dots span { width: 12px; height: 12px; border-radius: 50%; display: inline-block; }
        .code-dots span:nth-child(1) { background: #ff5f56; }
        .code-dots span:nth-child(2) { background: #ffbd2e; }
        .code-dots span:nth-child(3) { background: #27ca40; }
        .code-content {
            padding: 1rem; margin: 0; overflow-x: auto;
            font-size: .85rem; line-height: 1.5;
        }
        .code-content code { color: #f8f8f2; white-space: pre; }
        .preview-label {
            font-size: .75rem; text-transform: uppercase;
            color: #6c757d; margin-bottom: .5rem; font-weight: 600; letter-spacing: .05em;
        }
        .component-ref {
            font-size: .75rem; color: #6c757d; font-family: monospace;
            background: #f8f9fa; padding: .25rem .5rem; border-radius: .25rem;
            display: inline-block; margin-bottom: 1rem;
        }
        .back-link {
            position: fixed; bottom: 20px; right: 20px;
            background: #0d6efd; color: #fff; padding: .5rem 1rem;
            border-radius: 2rem; text-decoration: none; box-shadow: 0 .25rem .5rem rgba(0,0,0,.15);
        }
        .back-link:hover { background: #0b5ed7; color: #fff; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-grid-3x3-gap me-2"></i> k1.lib-bootstrap
            </a>
            <span class="navbar-text text-white-50"><?= $component_name ?? 'Component' ?></span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="index.php" class="back-link">
                    <i class="bi bi-arrow-left me-1"></i> All Components
                </a>
