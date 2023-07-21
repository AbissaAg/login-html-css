<?php
session_start();
require_once "includes/functions.php";

if(isLogged()){
    redirect("profile");
}
