<?php
session_start();
require_once "includes/functions.php";

if(!isLogged()){
    setFlash("Vous devez d'abord vous connecter pour accéder à cette page", "error");
    redirect("login");
}
