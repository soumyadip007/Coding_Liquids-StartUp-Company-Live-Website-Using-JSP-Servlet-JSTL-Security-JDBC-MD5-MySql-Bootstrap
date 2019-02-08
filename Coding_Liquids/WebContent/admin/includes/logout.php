<?php
/*
 * Nullifies all session variable so that user logs out and have to re login inorder
 * to gain access to admin panel
 * */
session_start();
$_SESSION['user_id'] = null;
$_SESSION["user_name"] = null;
$_SESSION["user_email"] = null;
$_SESSION["user_pwd"] = null;
$_SESSION["first_name"] = null;
$_SESSION["last_name"] = null;
$_SESSION["country"] = null;
$_SESSION["user_bio"] = null;


header('Location: ../index.php');
?>