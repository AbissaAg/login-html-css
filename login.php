<?php
$title = "Connexion";

require_once "filters/guest_filter.php";
require_once "config/database.php";
require_once "includes/functions.php";
require_once "includes/constants.php";

ob_start();

require 'partials/header.php';
require 'partials/navbar.php';

$header = ob_get_clean();

if (isset($_POST["login"])) {
    saveInputData();
    if(notEmpty($_POST)){
        extract($_POST);
        $stmt = $db->prepare("select * from users where email=:username or username=:username");
        $stmt->execute(['username'=>$username]);

        $user = (object) $stmt->fetch();

        if(isset($user->password)){
            //check password
            if(bcriptVerifyPassword($password, $user->password)){
                setUser($user);
                header('location: profile.php');
                exit();

            }else{
                setFlash("Identifiant ou Mot de passe incorrect", "error");
            }
        }else{
            setFlash("Identifiant ou Mot de passe incorrect", "error");
        }
    }else{
        setFlash("Veuillez remplir correctement tous les champs", "error");
    }

  
    
}else {
    clearInputData();
}
require "views/login.view.php";
