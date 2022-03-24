<?php
    require_once('./models/post.php');
    session_start();
    // TODO: Get all data from database and display it
    
    $username = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = getDataUser($password,$username);

   $id = $_GET['post_id'];
   $post = getPostById($id);
?>
<div class="container p-3 container-comment">
    <div class="card col-6 p-2">
        <div class="commenter p-3">
            <div class="profile p-2">
                <img src="../images/<?= $user['image'] ?>" alt="profile" class="image-profile" width="40px" height="40px">
                <strong class="p-2 profile-name"><?= $user['username'] ?></strong>
            </div>

            <?php


                if(isset($_GET['comment_id']) & isset($_GET['post_id'])){
                    $id = $_GET['comment_id'];
                    $comment = getCommentById($id);
                    ?>
                    <form action="../controllers/comment_controller.php" class="form-comment p-3" method="POST">
                        <input type="text" class="form-control p-3 comment" value="<?php  if(isset($_GET['comment_id'])){ echo $comment['description'];}?>" name="comment_desc" placeholder="Add comment ...">
                        <input type="hidden" value="<?php echo $comment['comment_id'];?>" name="commentId">
                        <input type="hidden" value="<?php echo $post['post_id'];?>" name="postId">
                        <button type="submit" name="submit-comment" class="btn mt-3">EDIT</button>
                    </form>
                <?php  
                }elseif (isset($_GET['post_id'])) {
                    
                    ?>
               
                    <form action="../controllers/comment_controller.php" class="form-comment p-3" method="POST">
                        <input type="text" class="form-control p-3 comment" name="comment_desc" placeholder="Add comment ...">
                        <input type="hidden" value="<?php echo $post['post_id'];?>" name="postId">
                        <button type="submit" name="submit-comment" class="btn mt-3">POST COMMENT</button>
                    </form>
                    <?php
                }
                ?>


            

            
            <?php
            
                $comments = getDataComments($id);
                foreach ($comments as $comment):
            ?>
            <div class="card m-2  box-comment  ">
                <div class="dropdown comment-post p-3 ">
                    <i class="fa fa-ellipsis-h fa-lg" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                    <input type="hidden" value="<?php echo $post['post_id'];?>" name="postId">
                        <li><a class="dropdown-item" href="../linkPage.php?pages=comment_view&comment_id=<?= $comment['comment_id']?>&post_id=<?= $post['post_id']?>">Edit</a></li>
                        <li><a class="dropdown-item" href="../controllers/comment_controller.php?comment_id=<?= $comment['comment_id']?>&post_id=<?= $post['post_id']?>">Delete</a></li>
                    </ul>
                </div>
                <div class=" p-3 text-comment">
                    <span ><?php echo $comment['description'] ?></span>

                </div>
            </div>
            <?php endforeach;?>
        </div>
        
        

        
    </div>
</div>