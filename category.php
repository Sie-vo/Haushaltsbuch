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

require_once "auth.php";
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $stmt = $pdo->prepare("INSERT INTO ".$dbprefix."categories (name) VALUES (:name)");
    $stmt->execute([
       'name' => $_POST['name']
    ]);
}

$cats = $pdo->query("SELECT * FROM ".$dbprefix."categories")->fetchAll();
require_once "header.php";
?>
<main class="flex-grow-1 p-4 p-md-5">
      <header class="mb-4">
        <h1 class="display-5 fw-bold mb-2">Katgorien</h1>
        <p class="text-secondary fw-medium">Deine Kategorien</p>
      </header>
<form method="POST" class="mb-4">
    <div class="input-group">
        <input type="text" name="name" class="form-control" placeholder="Neue Kategorie hinzufügen" required>
        <button class="btn btn-primary" type="submit">Hinzufügen</button>
    </div>
</form>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach ($cats as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['name'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</main>
<?php
include "footer.php";