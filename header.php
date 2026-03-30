<?php
/*
Author: Dennis Vorpahl
Copyright (c) 2026 Dennis Vorpahl
https://sievo.de
info@sievo.de

header.php Version 1.0.0 

Diese Datei ist Teil von Sievo Haushaltsbuch.

    Sievo Haushaltsbuch ist Freie Software: Sie können es unter den Bedingungen
    der GNU General Public License, wie von der Free Software Foundation,
    Version 3 der Lizenz oder (nach Ihrer Wahl) jeder neueren
    veröffentlichten Version, weiter verteilen und/oder modifizieren.

    Sievo Haushaltsbuch wird in der Hoffnung, dass es nützlich sein wird, aber
    OHNE JEDE GEWÄHRLEISTUNG, bereitgestellt; sogar ohne die implizite
    Gewährleistung der MARKTFÄHIGKEIT oder EIGNUNG FÜR EINEN BESTIMMTEN ZWECK.
    Siehe die GNU General Public License für weitere Details.

    Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
    Programm erhalten haben. Wenn nicht, siehe <https://www.gnu.org/licenses/>.*/

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9f9fb;
    }
    h1, h2, h3, .brand-font {
      font-family: 'Manrope', sans-serif;
      color: #70008b;
    }
    .text-primary {
      color: #70008b !important;
    }
    .text-secondary {
      color: #5f5e5e !important;
    }
    .text-muted {
      color: #70008b !important;
    }
    .btn-primary {
        font-weight: 600;
        color: white;
        background-color: #70008b;
        border-color: #70008b;
    }
    .btn-primary:hover {
        color: #f8f3fa;
        background-color: #8e24aa;
        border-color: #8e24aa;
    }
    .glass-header {
      background-color: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(12px);
    }
    .custom-scrollbar::-webkit-scrollbar {
      width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
      background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: #e2e2e4;
      border-radius: 10px;
    }
    .dropzone {
      border: 2px dashed #dee2e6;
      border-radius: 0.75rem;
      padding: 2rem;
      text-align: center;
      cursor: pointer;
      background-color: #f8f9fa;
      transition: border-color 0.2s ease;
    }
    .dropzone:hover {
      border-color: purple;
    }
    .sidebar-width {
      width: 16rem;
    }
    .bi {
      font-size: 2rem;
      color: #70008b;
    }
  </style>
</head>
<body class="text-dark">
    <header class="sticky-top glass-header shadow-sm">
        <div class="d-flex justify-content-between align-items-center px-3 py-2 w-100">
        <div class="d-flex align-items-center gap-3">
            <span class="fs-4 fw-bold text-primary brand-font fst-italic">Sievo Haushaltsbuch</span>
        </div>
        <!--<div class="d-flex align-items-center gap-3">
            <div class="position-relative d-none d-md-block">
            <input type="text" class="form-control rounded-pill ps-4 pe-5" placeholder="Search..."/>
            <span class="material-symbols-outlined position-absolute top-50 end-0 translate-middle-y me-3 text-muted">search</span>
            </div>
            <div class="d-flex align-items-center gap-2">
            <button class="btn btn-light rounded-circle p-2">
            <span class="material-symbols-outlined text-secondary">notifications</span>
            </button>
            <button class="btn btn-light rounded-circle p-2">
            <span class="material-symbols-outlined text-secondary">account_circle</span>
            </button>
            </div>
        </div>-->
        </div>
    </header>
    <?php
    if (isset($_SESSION['user_id'])) {
        ?>
        <div class="d-flex" style="min-height: calc(100vh - 64px);">
    <!-- SideNavBar -->
    <aside class="d-none d-md-flex flex-column bg-light border-end p-4 sidebar-width" style="height: calc(100vh - 64px); position: sticky; top: 64px;">
      <div class="mb-4">
        <p class="text-uppercase text-muted small fw-bold mb-3">Main Menu</p>
        <nav class="d-flex flex-column gap-1">
          <a href="index.php" class="d-flex align-items-center gap-2 px-3 py-2 text-secondary text-decoration-none">
            <i class="bi bi-house-door-fill"></i> Start
          </a>
          <a href="add.php" class="d-flex align-items-center gap-2 px-3 py-2 text-secondary text-decoration-none">
            <i class="bi bi-plus-circle-fill"></i> Hinzufügen
          </a>
          <a href="category.php" class="d-flex align-items-center gap-2 px-3 py-2 text-secondary text-decoration-none">
            <i class="bi bi-folder-plus"></i> Kategorie hinzufügen
          </a>
        </nav>
      </div>
      <div class="mt-auto pt-4 border-top">
        <!-- <div class="p-4 rounded bg-primary text-white mb-3">
          <p class="text-uppercase small fw-bold opacity-75 mb-1">Premium Access</p>
          <p class="fw-bold mb-3">Upgrade to Pro</p>
          <button class="btn btn-light w-100 fw-bold btn-sm text-primary">Unlock Features</button>
        </div> -->
        <nav class="d-flex flex-column gap-1">
          <!--<a href="#" class="d-flex align-items-center gap-2 px-3 py-2 text-secondary text-decoration-none">
            <span class="material-symbols-outlined">settings</span> Settings
          </a>-->
          <a href="logout.php" class="d-flex align-items-center gap-2 px-3 py-2 text-secondary text-decoration-none">
            <span class="material-symbols-outlined">logout</span> Logout
          </a>
        </nav>
      </div>
    </aside>

<?php
    }