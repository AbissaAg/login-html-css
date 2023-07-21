<?php

require_once "includes/constants.php";
try {
    $db = new PDO("mysql:host=".DB_Host.";dbname=".DB_Name, DB_username, DB_password);
    // PDO Exception : Activer les erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $exception) {
    // Afficher les erreurs
    echo $exception;
}
