<form action="../controllers/create_post.php" class="post-form m-auto mt-5 col-6" enctype="multipart/form-data" method="post">
      
            <div class="card post">
                <div class="card-header post-header">
                    <h5>POST</h5>
                </div>
                <div class="card-body post-body">
                    <input type="text" name="description" class="form-control p-3" placeholder="What is your mind">
                    <div class="img-post">
                        <img id = "img-post" src="" width="100%" alt="">

                    </div>
                </div>
                <div class="card-footer post-footer p-3">
                    <label class="btn btn-outline-primary m-1" for="files">Select Image</label>
                    <input type="file" name="file_name" id="files" onchange="loadFile(event)"  style="display:none">
                    <button type="submit" name="post" class="btn btn-primary m-1" >POST</button>
                </div>
            </div>
    
    </form>