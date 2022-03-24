<?php   
require_once('./models/post.php');  
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$user = getDataUser($password,$email);
?>

<div class="container p-3">
    <div class="col-6 cover">
        <div class="profile-menu-profile rounded-circle">
            <img src="../images/<?php echo $user['image'] ?>" alt="image" class=" image-profile " width="100px" height="100px" id="img-profile">
            <form action="../controllers/upload_profile_controller.php" enctype="multipart/form-data" method="POST">
                <input type="file" name="file_image" id="profile" onchange="loadProfile(event)" style="display:none">
                <div class="icons d-flex" style="margin-top: -20px; margin-left: 60px;">
                    <label for="profile" class="fa fa-camera text-primary m-2" style="font-size: 20px; cursor: pointer;"></label> 
                    <button type="submit" id="submit-profile" class="fa fa-check-circle-o text-success" style="border: none; background:none; font-size: 20px; display:none;"></button>

                </div>
            </form>
        </div>
    </div>
 
</div>

<?php
require_once("post_view.php");
?>