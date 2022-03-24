<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    require_once("../models/post.php");
    $username = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = getDataUser($password,$username);

    $file_image = $_FILES['file_image']['name'];
    $extension = pathinfo($file_image,PATHINFO_EXTENSION);
    $randomno=rand(0,100000);
    $rename='image'.date('Ymd').$randomno;
    $newname=$rename.'.'.$extension;
    $target = "../images/" .$newname;
    $temporary=$_FILES['file_image']['tmp_name'];
    if (move_uploaded_file($temporary,$target)){
        echo "";
    }else{
        $post = getPostById($id);
        $newname=$post['image'];
    }
    

    uploadProfile($newname,$user['user_id']);
    
    header('location: /linkPage.php');