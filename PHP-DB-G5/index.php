<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

    <link rel="stylesheet" href="CSS/style.css">

</head>

<body> 

    
    <div class="h1">
    <h2 class="titleLogin">facebook</h2>
    <p class="praLogin">Facebook helps you to find new relationship.</p>
    </div>  
            <form class="main-form"  action="controllers/checkUserLogin.php" method="post">
                <?php if (isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>
                <input type="text" name="emailLogin" placeholder="Email address" class="main-input"><br>
                <input type="password" name="passwordLogin" placeholder="Password" class="main-input"><br>
                <input type="submit" value="Log In" name="submit" class="login-btn"><br>

                <p class="p">Don't have an Account?</p>
            
                <div class="createAcount">
                    <a href="signUp.php" class="btn-createAcount">Create New Account</a>
                </div>
          
            
            </form>
</body>
</html>