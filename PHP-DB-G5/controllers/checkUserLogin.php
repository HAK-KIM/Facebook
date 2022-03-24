<?php
    session_start();
    require_once("../models/post.php");
    $_SESSION['email'] = $_POST['emailLogin'];
    $_SESSION['password'] = $_POST['passwordLogin'];
    $user=getDataUser($_SESSION['password'],$_SESSION['email']); 
  
    if( empty($_SESSION['password']) & empty($_SESSION['email'])){
     
      header('location:/index.php?error=Invalid input');

    }elseif(empty($_SESSION['password'])){
      header('location:/index.php?error=Password is requierd');
    }elseif(empty($_SESSION['email'])){
      header('location:/index.php?error=Email is requierd');
    }else{
     
      if($_SESSION['password']==$user['password'] && $_SESSION['email']==$user['email']){



        header('location:/linkPage.php');
      

        }elseif($_SESSION['password']!==$user['password'] || $_SESSION['email']!==$user['email']){
        
        header('location:/index.php?error=Invalid email or password');
        
        }
    }
    
?>

