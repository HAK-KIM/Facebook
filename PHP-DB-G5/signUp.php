<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>  

    <form class="modal" method="post" action="controllers/signup_controller.php">
        <h1 class="title">facebook</h1>
        <p class="pra">Facebook helps you to find new relationship.</p>        
        <div class="modal-signup">          
           <div class="modal-signup-heading">              
               <p class="modal-signup-name">Sign Up</p>              
               <p class="modal-signup-child-name">It's quick and easy.</p>              
           </div>   
           <?php if (isset($_GET['errorsignup'])){?>
                    <p class="errorsignup"><?php echo $_GET['errorsignup']; ?></p>
               <?php } ?>       
           <div class="modal-signup-name">                    
              <input type="text" name="username" placeholder="Username">              
           </div>           
           <div class="modal-signup-email">                   
              <input type="email" name="email" placeholder="Email address">                     
           </div>                
           <div class="modal-signup-password">                    
               <input type="password" name="password" placeholder="Password">                    
            </div>            
            <div class="modal-gender">              
               <label for="">Gender</label>  
            </div>           
            <div class="modal-gender-choice">               
               <div class="modal-gender-name">                  
                   <label for="femal">Femal</label>                  
                   <input name="gender" value="F" id="femal" type="radio">                  
               </div>             
               <div class="modal-gender-name">                  
                   <label for="male">Male</label>
                   <input name="gender" value="M" id="male" type="radio">
               </div>
            </div>
            <div class="modal-signup-button">                
                <button>Sign Up</button>               
            </div>           
        </div>      
    </form>
</body>
</html>