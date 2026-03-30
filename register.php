<?php
/*
Author: Dennis Vorpahl
Copyright (c) 2026 Dennis Vorpahl
https://sievo.de
info@sievo.de

register.php Version 1.0.0 

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
require_once 'db.php';

    $stmt = $pdo->prepare("SELECT * FROM ".$dbprefix."settings WHERE name = 'register'");
    $stmt->execute();
    $settings = $stmt->fetch();
    if (!$settings || $settings['value'] !== '0') {
        die("Registrierung ist derzeit geschlossen.");
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO ".$dbprefix."users (email, password) VALUES (?, ?)");
    $stmt->execute([$_POST['email'], $password]);
    $pdo->exec(("UPDATE ".$dbprefix."settings SET value = '0' WHERE name = 'register'"));

    header("Location: login.php");
}
require_once "header.php";
?>

<form method="POST" href="register.php">
    <label for="email">E-Mail:</label>
    <input type="email" name="email" required>
    <label for="password">Passwort:</label>
    <input type="password" name="password" required>
    <button class="btn btn-primary" type="submit">Registrieren</button>
</form>
<?php
include "footer.php";