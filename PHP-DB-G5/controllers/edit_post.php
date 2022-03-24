<?php
        require_once('../models/post.php');

        $id = $_POST['postId'];
        $post_desc = $_POST['description'];
        $file_name = $_FILES['file_name']['name'];
        $extension = pathinfo($file_name,PATHINFO_EXTENSION);
        $randomno=rand(0,100000);
        $rename='upload'.date('Ymd').$randomno;
        $newname=$rename.'.'.$extension;
        $target = "../upload_image/" .$newname;
        $temporary=$_FILES['file_name']['tmp_name'];
        if (move_uploaded_file($temporary,$target)){
            echo "";
        }else{
            $post = getPostById($id);
            $newname=$post['image'];
        }
        

        updatePost($id, $post_desc,  $newname);
        
        header('location: /linkPage.php');


    ?>
