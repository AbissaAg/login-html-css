<?php
$title = "Profile";
require_once "config/database.php";
require_once "includes/constants.php";
require_once "filters/auth_filter.php";

require 'partials/header.php';
require 'partials/navbar.php';
$currentUser = getUser();

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    if($currentUser->id != $user_id){
        $stmt = $db->prepare("select * from users where id= ?");
        $stmt->execute([$user_id]);
        if($stmt->rowCount()){
            $user = $stmt->fetch(PDO::FETCH_OBJ);
        }
    }else{
        $user = $currentUser;
    }
} else {
    $user = $currentUser;
}



require_once "views/profile.view.php";

require 'partials/footer.php';
