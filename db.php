<?php
    $server = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "mglsi_news";

    $mysql_connect = new mysqli($server, $username, $password, $dbname);

    if ($mysql_connect->connect_error) {
        die('Problème de connexion à la base de données : ' . $mysql_connect->connect_error);
    }

    // Vérifier la sélection de la base de données (non nécessaire avec mysqli)
    if (!$mysql_connect->select_db($dbname)) {
        die("Sélection de la base de données échouée: " . $mysql_connect->error);
    }
?>
