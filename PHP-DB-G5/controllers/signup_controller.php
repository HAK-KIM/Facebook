<?php
    require_once("../models/post.php");
    
    if( empty($_POST['username']) && empty($_POST['email'])&& empty($_POST['password'])&& empty($_POST['gender'])){
        
        header('location:/signup.php?errorsignup=Invalid input');
        
    

    }elseif(empty($_POST['username'])){
        
        
        header('location:/signup.php?errorsignup=Username is requierd');
    }elseif(empty($_POST['email'])){
        
       
        header('location:/signup.php?errorsignup=Email is requierd');
    }elseif(empty($_POST['password'])){
        
       
        header('location:/signup.php?errorsignup=Password is requierd');
    }
    else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        createUsers($username,  $email, $password,$gender );
        header('location:/index.php');
       
     
    }
?>

<!-- if( !empty($_POST['username']) && !empty($_POST['email'])&& !empty($_POST['password'])&& !empty($_POST['gender'])){
        
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        createUsers($username,  $email, $password,$gender );
        header('location:/index.php');
    

    }else{
       
        header('location:/signup.php');
    } -->