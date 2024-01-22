<?php

// Informations de connexion à la base de données
$host = '127.0.0.1:3307';
$dbname = 'tpmariadb';
$user = 'root';
$pass = '';

try {
    // Construction du DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname";

    // Création de l'objet PDO avec le DSN, le nom d'utilisateur et le mot de passe
    $pdo = new PDO($dsn, $user, $pass);

    // On spécifie le type de caractère que l'on utilise
    $pdo->query("SET NAMES 'utf8'");

    // Défini le signalement des erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    // Message d'erreur si la connexion est impossible
    die('ERREUR PDO : ' . $e->getMessage() . ' => (Vérifier les paramètres de connexion)');
}

// Préparation de la requête
$prep = $pdo->prepare( 'SELECT * FROM jours' );

// Définition des valeurs
//$prep->bindValue( 'maVariableSql1', 'maValeur' );

// Exécution de la requête
$prep->execute();

// Récupération des résultats dans un tableau associatif
$arrAll = $prep->fetchAll();



?>