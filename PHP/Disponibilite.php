<?php

// Informations de connexion à la base de données
$host = '127.0.0.1:3307';
$dbname = 'tpmariadb';
$user = 'root';
$pass = '';

try {
    // Construction du DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname";

    // Connexion à MySQL/MariaDB
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Sélectionner toutes les colonnes de la table 'jours'
    $stmt = $pdo->query("SELECT * FROM jours");

    // Récupérer les résultats
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats dans un tableau HTML
    echo '<table border="1">';
    echo '<tr><th>Jour</th><th>Date</th></tr>';

    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['jour'] . '</td>';
        echo '<td>' . $row['capacite'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} catch (PDOException $e) {
    // Gérer les erreurs de connexion ou d'exécution de la requête
    die('ERREUR PDO : ' . $e->getMessage());
}
?>