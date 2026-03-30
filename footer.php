<?php
/*
Author: Dennis Vorpahl
Copyright (c) 2026 Dennis Vorpahl
https://sievo.de
info@sievo.de

footer.php Version 1.0.0 

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

<!-- Mobile Bottom Navigation -->
  <nav class="d-md-none fixed-bottom bg-white border-top px-3 py-2 d-flex justify-content-between align-items-center">
    <button class="btn btn-link text-decoration-none d-flex flex-column align-items-center gap-1 text-muted  onclick="window.location.href='index.php'">
      <span class="material-symbols-outlined">dashboard</span>
      <span class="small fw-bold">Home</span>
    </button>
    <button class="btn btn-link text-decoration-none d-flex flex-column align-items-center gap-1 text-muted onclick="window.location.href='index.php'">
      <span class="material-symbols-outlined">receipt_long</span>
      <span class="small fw-bold">List</span>
    </button>
    <button class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="margin-top: -1.5rem; width: 3.5rem; height: 3.5rem;" onclick="window.location.href='add.php'">
      <span class="material-symbols-outlined">add</span>
    </button>
    <button class="btn btn-link text-decoration-none d-flex flex-column align-items-center gap-1 text-muted" onclick="window.location.href='stats.php'">
      <span class="material-symbols-outlined">insights</span>
      <span class="small fw-bold">Stats</span>
    </button>
    <button class="btn btn-link text-decoration-none d-flex flex-column align-items-center gap-1 text-muted" onclick="window.location.href='profile.php'">
      <span class="material-symbols-outlined">person</span>
      <span class="small fw-bold">Me</span>
    </button>
  </nav>

  <!-- Bootstrap JS (optional, for interactive components) -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jQWcRZ91b4Y2b2Q"
    crossorigin="anonymous"
  ></script>
</body>
</html>