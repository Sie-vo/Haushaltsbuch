<?php
/*
Author: Dennis Vorpahl
Copyright (c) 2026 Dennis Vorpahl
https://sievo.de
info@sievo.de

index.php Version 1.0.0 

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
require_once 'auth.php';
require_once 'db.php';
require_once "header.php";

$stmt = $pdo->prepare("SELECT * FROM ".$dbprefix."transactions WHERE user_id = :user ORDER BY created_at DESC");
$stmt->execute(['user' => $_SESSION['user_id']]);
$transactions = $stmt->fetchAll();

$income = 0;
$expense = 0;

foreach ($transactions as $t) {
    if ($t['type'] === 'income') {
        $income += $t['amount'];
    } else {
        $expense += $t['amount'];
    }
}

$balance = $income - $expense;
?>
 <main class="flex-grow-1 p-4 p-md-5">
      <header class="mb-4">
        <h1 class="display-5 fw-bold mb-2">Haushaltsbuch</h1>
        <p class="text-secondary fw-medium">Deine Übersicht</p>
      </header>

<p>Einnahmen: <?= $income ?> €</p>
<p>Ausgaben: <?= $expense ?> €</p>
<p><strong>Saldo: <?= $balance ?> €</strong></p>

<a href="add.php" class="btn btn-primary">+ Neue Buchung</a>

<table>
    <tr>
        <th>Datum</th>
        <th>Betrag</th>
        <th>Typ</th>
        <th>Beschreibung</th>
    </tr>

    <?php foreach ($transactions as $t): ?>
    <tr>
        <td><?= $t['created_at'] ?></td>
        <td><?= $t['amount'] ?> €</td>
        <td><?= $t['type'] ?></td>
        <td><?= $t['description'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</main>
<?php
include "footer.php";