<?php
    require_once("../models/post.php");

    if (isset($_POST['commentId'])) {
        $id = $_POST['commentId'];    
        $post_id = $_POST['postId'];
        $comment_desc = $_POST['comment_desc'];
        upDateComment($id, $comment_desc);
    } elseif(isset($_GET['comment_id'])){
        $comment_id = $_GET['comment_id'];
        $post_id = $_GET['post_id'];
        deleteComment($comment_id);
    } else {
        $comment_desc = $_POST['comment_desc'];
        $post_id = $_POST['postId'];
        createComments($comment_desc,$post_id);
    }

    


    
    header("location:/linkPage.php?pages=comment_view&post_id=$post_id");
?>
