<?php 

    $str_json = file_get_contents('php://input');
    echo $str_json;

    $host = '127.0.0.1:3307';
    $dbname = 'tpmariadb';
    $user = 'root';
    $pass = '';


?>