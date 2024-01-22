<?php 

    $str_json = file_get_contents('php://input');
    $Data = json_decode($str_json, true);
    echo $str_json;

    $host = '127.0.0.1:3307';
    $dbname = 'tpmariadb';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $dbname);


?>