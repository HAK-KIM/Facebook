<?php
session_start();
require_once("../models/post.php");
$username = $_SESSION['email'];
$password = $_SESSION['password'];
$user = getDataUser($password,$username);
print_r($user);
$post_id = $_GET['post_id'];
AddLike($user['user_id'],$post_id);
header('location: /linkPage.php');
?>