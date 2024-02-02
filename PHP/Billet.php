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
    $number = $Data['nombre_de_place'];
    $status = $Data['user_message'];
    //les jours sont a faire, si plusieurs jours, plusieurs requettes,
    $day = $Data['jours'];
    $userID= $Data['user_id'];


    if($day['vendredi']== true){
        
        $sql = "INSERT INTO detail ( NOM_RESERVATION, TYPE, JOUR_RESERVATION, NB_PLACE, COMMENTAIRE, USER_ID) VALUES (:name, :anotherField, '2024-05-10', :number, :status,:user_id)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':anotherField', $anotherField);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id',$userID);

        $stmt->execute();
    }

    if($day['samedi']== true){
        
        $sql = "INSERT INTO detail ( NOM_RESERVATION, TYPE, JOUR_RESERVATION, NB_PLACE, COMMENTAIRE) VALUES (:name, :anotherField, '2024-05-11', :number, :status)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':anotherField', $anotherField);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':status', $status);

        $stmt->execute();
    }
    if($day['dimanche']== true){
        
        $sql = "INSERT INTO detail ( NOM_RESERVATION, TYPE, JOUR_RESERVATION, NB_PLACE, COMMENTAIRE) VALUES (:name, :anotherField, '2024-05-12', :number, :status)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':anotherField', $anotherField);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':status', $status);

        $stmt->execute();
    }



    


    echo "Record inserted successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

?>