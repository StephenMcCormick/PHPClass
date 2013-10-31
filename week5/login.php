<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        
        if ( Validator::loginIsValidPost() )
        {
            $_SESSION["isLoggedin"] = true;
        }
        
        if( isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"] == true )
        {
            header("Location: admin.php");
        }

        ?>
        <h1>Login</h1>
        <form name="mainform" action="login.php" method="post">
            
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
                      
            <input type="submit" value="Submit" />
            
        </form>
    </body>
</html>