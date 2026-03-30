<?php
/*
Author: Dennis Vorpahl
Copyright (c) 2026 Dennis Vorpahl
https://sievo.de
info@sievo.de

add.php Version 1.0.0 

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
require 'auth.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO ".$dbprefix."transactions (user_id, amount, type, description, created_at) VALUES (:user_id, :amount, :type, :description, :created_at)");
    $stmt->execute([
        ':user_id' => $_SESSION['user_id'],
        ':amount' => $_POST['amount'],
        ':type' => $_POST['type'],
        ':description' => $_POST['description'],
        ':created_at' => date('Y-m-d H:i:s')   
    ]);

    header("Location: index.php");
}
$cats = $pdo->query("SELECT * FROM ".$dbprefix."categories")->fetchAll();
require "header.php";
?>
<main class="flex-grow-1 p-4 p-md-5">
      <header class="mb-4">
        <h1 class="display-5 fw-bold mb-2">Haushaltsbuch</h1>
        <p class="text-secondary fw-medium">Neue Buchung</p>
      </header>
<form method="POST" action="add.php">
    <input type="number" step="0.01" name="amount" placeholder="Betrag" required>
    
    <select name="type">
        <option value="income">Einnahme</option>
        <option value="expense" selected>Ausgabe</option>
    </select>
    <select name="category_id">
    <?php foreach ($cats as $cat): ?>
        <option value="<?= $cat['id'] ?>">
            <?= $cat['name'] ?>
        </option>
    <?php endforeach; ?>
    </select>
    <input type="text" name="description" placeholder="Beschreibung">

    <button type="submit" class="btn btn-primary">Speichern</button>
</form>
</main>
<?php
include "footer.php";