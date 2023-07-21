<?php
session_start();
require_once "includes/functions.php";
logout();
header('location: login.php');
exit();