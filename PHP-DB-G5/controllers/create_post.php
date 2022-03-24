<?php
    session_start();
    require_once("../models/post.php");
    if( !empty($_POST['description']) || !empty($_FILES['file_name']['name'])){
        
        $file_name = $_FILES['file_name']['name'];
        $description = $_POST['description'];

        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $user = getDataUser($password,$email);

        $user_id = $user['user_id'];

        createPost($description, $file_name,$user_id);
    

    }else{
       ?>
     
        <script>alert("please in put all file")</script>;
        
     <?php
    }
    header('location:/linkPage.php');
?>

