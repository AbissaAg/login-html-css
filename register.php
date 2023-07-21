<?php
$title = "Inscription";
require_once "filters/guest_filter.php";

require_once "includes/constants.php";
require_once "config/database.php";
require_once "includes/functions.php";

// La fonction ob_start permet d'ouvrir un bloc d'instruction dont le resulat
// ne sera pas aussitot afficher
ob_start();

require 'partials/header.php';
require 'partials/navbar.php';

$header = ob_get_clean();

if (isset($_POST["register"])) {

    saveInputData();

    $errors = [];

    extract($_POST); // Permet d'extraire les elements d'un tableau

    if (empty($name)) {
        $errors['name'] = "Veuillez saisir votre nom";
    }
    if (empty($lastname)) {
        $errors['lastname'] = "Veuillez saisir votre prénom";
    }
    if (empty($email)) {
        $errors['email'] = "Veuillez saisir votre email";
    } else if (isAlreadyInUse("email", $email)) {
        $errors['email'] = "Adresse email déjà utiliser";
    }
    if (empty($username)) {
        $errors['username'] = "Veuillez saisir votre nom d'utilisateur";
    } else if (isAlreadyInUse("username", $username)) {
        $errors['username'] = "Cet nom d'utilisateur existe déjà";
    }
    if (empty($sex)) {
        $errors['sex'] = "Veuillez spécifier votre genre";
    } 

    if (empty($birthday)) {
        $errors['birthday'] = "Veuillez saisir votre date de naissance";
    }
    if (empty($password)) {
        $errors['password'] = "Veuillez saisir votre mot de passe";
    }
    if (empty($passwordConfirm)) {
        $errors['passwordConfirm'] = "Veuillez confirmer votre mot de passe";
    }

    if (strcmp($password, $passwordConfirm)) {
        $errors['passwordConfirm'] = "Les mot de passe ne correspondent pas";
    }

    if (empty($errors)) {
        // enregistrement de l'utilisateur
        $stmt = $db->prepare("insert into users(name, lastname, email, username, avatar, sex, birthday, password) 
        values(:name, :lastname, :email, :username, :avatar, :sex, :birthday, :password)");
        $stmt->execute([
            "name" => $name,
            "lastname" => $lastname,
            "email" => $email,
            "username" => $username,
            "sex" => $sex,
            "avatar"=> $sex == "M" ? "./assets/img/man.jpg" :  "./assets/img/woman.jpg",
            "birthday" => $birthday,
            "password" => bcriptPasswordHash($password)
        ]);
        if ($stmt->rowCount()) {

            // Envoie du mail d'activation

            $token = sha1($_POST["email"] . $_POST['password']);

            ob_start();

            require 'templates/emails/activate.tmp.php';

            $message = ob_get_clean();

            $subject = " Activation de compte - " . WebSiteName;

            $to = $_POST['email'];

            // $mailler = sendMail($to, $subject, $message);

            // if ($mailler->send()) {
            //     header("location: index.php");
            //     exit();
            // } else {
            // }


            setFlash('Compte créé avec succèss', "success");


            header("location: login.php");
            exit();


            // rediriger vers la page de connexion

        } else {
            // Afficher les erreurs
        }
    } else {
        setFlash($errors, "error");
    }
} else {
    clearInputData();
}

require "views/register.view.php";
