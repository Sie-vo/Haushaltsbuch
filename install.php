<?php
/*
Author: Dennis Vorpahl
Copyright (c) 2026 Dennis Vorpahl
https://sievo.de
info@sievo.de

install.php Version 1.0.0 

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
require_once "header.php";
require_once "db.php";

echo ' <!-- Main Content Canvas -->
    <main class="flex-grow-1 p-4 p-md-5">
      <header class="mb-4">
        <h1 class="display-5 fw-bold mb-2">Installation</h1>
        <p class="text-secondary fw-medium">Installieren von Sievo Haushaltsbuch.</p>
      </header>';
if (empty($db_host) || empty($db_user) || empty($db_pass) || empty($db_name)) {
    echo '<div class="alert alert-warning">Du musst noch die Datenbankverbindung in der db.php eintragen.</div>';
    echo '<button class="btn btn-primary" onclick="window.location.href=\'install.php\'">Nochmal versuchen</button>';
    echo '</main>';
    include "footer.php";
    exit;
}
try {
    
    $pdo->exec("CREATE TABLE ".$dbprefix."users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE ".$dbprefix."categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE ".$dbprefix."settings (
        name VARCHAR(100) NOT NULL PRIMARY KEY,
        value VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE ".$dbprefix."transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        category_id INT NOT NULL DEFAULT 1,
        amount DECIMAL(10,2) NOT NULL,
        type ENUM('income','expense') NOT NULL,
        description VARCHAR(255) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

        FOREIGN KEY (user_id) REFERENCES ".$dbprefix."users(id),
        FOREIGN KEY (category_id) REFERENCES ".$dbprefix."categories(id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("INSERT INTO ".$dbprefix."settings (name, value) VALUES ('register', '0')");

    echo "<p>Die Installation ist abgeschlossen! Die Datenbanktabellen wurden erstellt.</p>";
    echo "<p>Bitte lösche aus Sicherheitsgründen die install.php Datei.</p>";
    echo '<button class="btn btn-primary" onclick="window.location.href=\'register.php\'">Zum Benutzer anlegen</button>';
} catch (PDOException $e) {
    echo "Fehler bei der Installation: " . $e->getMessage();
    echo '<button class="btn btn-primary" onclick="window.location.href=\'install.php\'">Nochmal versuchen</button>';
}#

echo '</main>';
include "footer.php";