<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        session_regenerate_id(true);
        $errors;
        
        $token = uniqid();
        
        //this is to avoid session hijaking
        if( !isset($_SESSION["token"]) )
        {
            $_SESSION["token"] = $token;
        }
        else
        {
            if( isset($_POST["token"]) && $_SESSION["token"] != $_POST["token"] )
            {
                session_destroy();
                header("Location:login.php");
                exit();
            }
        }
        
        
        $_SESSION["token"] = $token;
        
        $email = (isset($_POST["email"]) ? $_POST["email"] : "");
        $password = (isset($_POST["password"]) ? $_POST["password"] : "");
        
        if(count($_POST))
        {
            if ( Validator::loginIsValid($email, $password) ) //check to make sure email and password match in database
            {
                $thisMore = new WebSiteDB(); // websitedb class
                
                $_SESSION["isLoggedin"] = true; // they are now logged in
                
                $userID = $thisMore->getUserID(); // use the class to get user id  
                $_SESSION["userID"] = $userID;
                
                header("Location:admin.php");
            }
            else
            {
               $errors = "Email or Password are not correct!" ;
            }
        }
        
        // if they are already logged in or if they have just successfuly logged in
        if( isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"] == true )
        {
            header("Location:admin.php");
        }

        ?>
        <h1>Login</h1>
        <form name="loginform" action="login.php" method="post">
            <?php 
               if ( !empty($errors) )
               {
                   echo '<p>',$errors,'</p>'; // display errors
               }       
            ?>
            Email: <input type="text" name="email" /> <br />
            Password: <input type="password" name="password" /> <br />
            
            <input type="hidden" name="token" value="<?php echo $token; ?>"/> <!-- avoid session hijacking-->
                      
            <input type="submit" value="Submit" />
            
        </form>
    </body>
</html>