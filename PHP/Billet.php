<?php 

    $str_json = file_get_contents('php://input');
    $Data = json_decode($str_json, true);
    echo $str_json;

    $host = '127.0.0.1:3307';
    $dbname = 'tpmariadb';
    $user = 'root';
    $pass = '';
    

try {
    // Connexion à MySQL/MariaDB
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Sélectionner toutes les colonnes de la table 'jours'
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $Data['user_name'];
    $anotherField = $Data['type_pass'];

    //les jours sont a faire, si plusieurs jours, plusieurs requettes,

    $day = 'Vendredi';



    $number = $Data['nombre_de_place'];
    $status = $Data['user_message'];

    $sql = "INSERT INTO detail ( NOM_RESERVATION, TYPE, JOUR_RESERVATION, NB_PLACE, COMMENTAIRE) VALUES (:name, :anotherField, :day, :number, :status)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':anotherField', $anotherField);
    $stmt->bindParam(':day', $day);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':status', $status);

    $stmt->execute();

    echo "Record inserted successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();

}

$pdo = null;

?>