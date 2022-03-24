<?php
require_once('database.php');

function createUsers($username,  $email, $password,$gender ){
    global $db;
    $statement=$db->prepare("INSERT INTO users(username, email, password, gender) VALUES (:username,:email,:password,:gender)");
    $statement->execute([
        ':username'=>$username,
        ':email'=>$email,
        ':password'=>$password,
        ':gender'=>$gender

    ]);
    return $statement->rowCount()==1;
}

function uploadProfile($file_image,$user_id){
    global $db;
    $statement=$db->prepare("UPDATE users SET image=:image where user_id=:user_id");
    $statement->execute([
        ':image'=> $file_image,
        ':user_id'=> $user_id,
        
    ]);
    return ($statement->rowCount()==1);
}

function getDataUser($password,$email) {
    global $db;
    $statement = $db->prepare("SELECT * FROM users where email=:email and password=:password;");
    $statement->execute([
        ':password'=> $password,
        ':email'=> $email
    ]);
    $users = $statement->fetch();
    return $users;
}
function getDataPosts($email,$password) {
    global $db;
    $statement = $db->prepare("SELECT * FROM user_posts where email=:email and password=:password order by post_id DESC");
    $statement -> execute(
        [
            ':email' => $email,
            ':password' => $password
        ]
        );
    $posts = $statement->fetchAll();
    return $posts;
}

function createPost($post_desc, $file_name,$user_id ){
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $randomno=rand(0,100000);
    $rename='upload'.date('Ymd').$randomno;
    $newname=$rename.'.'.$extension;

    $target = "../upload_image/" .$newname;
    $temporary=$_FILES['file_name']['tmp_name'];
    move_uploaded_file($temporary,$target);

    global $db;

    $statement=$db->prepare("INSERT INTO posts(description, image,user_id) VALUES (:post_desc,:image,:user_id)");
    $statement->execute([
        ':post_desc'=>$post_desc,
        ':image'=>$newname,
        ':user_id' => $user_id

    ]);
    return $statement->rowCount()==1;
}

function getPostById($id){
    global $db;
    $statement=$db->prepare("SELECT post_id, description, image FROM posts WHERE post_id=:id_post;");
    $statement->execute([
        ':id_post' => $id
    ]);
    $post = $statement->fetch();
    return $post;
}

function updatePost($id, $post_desc,  $file_name){

    global $db;
    $statement=$db->prepare("UPDATE posts SET description=:post_desc, image=:image WHERE post_id=:id_post");
    $statement->execute([
        ':post_desc'=> $post_desc,
        ':image'=> $file_name,
        ':id_post'=> $id
    ]);
    return ($statement->rowCount()==1);
}
function deletePost($id)
{
    
    global $db;

    $statament = $db->prepare("DELETE FROM posts where post_id=:id;");
    $statament -> execute([
        ':id' => $id
    ]);
    return ($statament -> rowCount()==1);
}

function getDataComments($post_id) {
    global $db;
    $statement = $db->query("SELECT description, comment_id, post_id FROM comments WHERE post_id = $post_id");
    $comments = $statement->fetchAll();
    return $comments;
}

function countComment($post_id){
    global $db;
    $statement = $db ->prepare("SELECT * FROM postcomment WHERE post_id=:post_id");
    $statement->execute([
        'post_id' => $post_id
    ]);
    return $statement->fetch();
}

function createComments($comment_desc,$post_id) {
    global $db;
    $statement = $db->prepare("INSERT INTO comments(description,post_id) VALUES (:comment_desc,:id_post)");
    $statement->execute([
        ':comment_desc'=> $comment_desc,
        ':id_post'=> $post_id
    ]);
    return ($statement -> rowCount()==1);
}
function deleteComment($comment_id)
{
    global $db;
    $statament = $db->prepare("DELETE FROM comments where comment_id=:id;");
    $statament -> execute([
        ':id' => $comment_id
    ]);
    return ($statament -> rowCount()==1);
}

function getCommentById($id){
    global $db;
    $statement=$db->prepare("SELECT * FROM comments WHERE comment_id=:id_comment;");
    $statement->execute([
        ':id_comment' => $id
    ]);
    $comment = $statement->fetch();
    return $comment;
}

function upDateComment($id, $comment_desc){
    
    global $db;
    $statement=$db->prepare("UPDATE comments SET description=:comment_desc WHERE comment_id=:id_comment");
    $statement->execute([
        ':comment_desc'=> $comment_desc,
        ':id_comment'=> $id
    ]);
    return ($statement->rowCount()==1);
}

function AddLike($user_id,$post_id) {
    global $db;
    $statement = $db->query("INSERT INTO likes(user_id,post_id) VALUES($user_id,$post_id)");
    return ($statement -> rowCount()==1);
}

function getLikes() {
    global $db;
    $statement = $db -> query("SELECT * FROM likes");
    $likes = $statement->fetchAll();
    return $likes;
}