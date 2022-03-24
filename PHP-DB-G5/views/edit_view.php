<?php
    require_once('./models/post.php');
   // TO DO:
   // Get the id of the item to update in query
   $id = $_GET['post_id'];
   // Get data for this item from database
   $post = getPostById($id);

    ?>
<form action="../controllers/edit_post.php" class="post-form m-auto mt-5 col-6" enctype="multipart/form-data" method="post">

      
            <div class="card post">
                <div class="card-header post-header">
                    <h5>POST</h5>
                </div>
                <input type="hidden" value="<?php echo $post['post_id'];?>" name="postId">
                <div class="card-body post-body">
                    <input type="text" name="description" class="form-control p-3" placeholder="What is your mind" value="<?php echo $post['description'];?>">
                    <div class="img-post">
                        <img id = "img-post" src="../upload_image/<?= $post['image']?>" width="100%" alt="">

                    </div>
                </div>
                <div class="card-footer post-footer p-3">
                    <label class="btn btn-outline-primary m-1" for="files">Select Image</label>
                    <input type="file" name="file_name" value="<?php echo $post['image'];?>" id="files" onchange="loadFile(event)"  style="display:none">
                    <button type="submit" name="post" class="btn btn-primary m-1">EDIT</button>
                </div>
            </div>
    
    </form>

<script>
    var loadFile = function(event) {
        var image = document.getElementById('img-post');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>