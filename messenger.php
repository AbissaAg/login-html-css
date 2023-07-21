<?php
$title = "Messenger";
require_once "config/database.php";
require_once "includes/constants.php";
require_once "filters/auth_filter.php";

require 'partials/header.php';
require 'partials/navbar.php';
$currentUser = getUser();
$stmt = $db->query("select * from users where id != $currentUser->id");
$users = $stmt->fetchAll(PDO::FETCH_OBJ);

if(isset($_GET['id'])){
    $selectedUser = getUser($_GET['id']);

    $messages = getMessage($selectedUser->id, $currentUser->id);
}

if(isset($_POST['sendMessage'])){
    extract($_POST);
    if(!empty($content)){
        $stmt = $db->prepare("insert into messages(subject_id, sender_id, content) values(:subject_id, :sender_id, :content)");
        $stmt->execute([
            'sender_id'=>$currentUser->id,
            'subject_id'=>$selectedUser->id,
            'content'=>$content
        ]);
        $messages = getMessage($selectedUser->id, $currentUser->id);
    }
}

require_once "views/messenger.view.php";

require 'partials/footer.php';

