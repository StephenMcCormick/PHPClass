<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <h1>Login</h1>
        <form name="mainform" action="login.php" method="post">
            
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
                      
            <input type="submit" value="Submit" />
            
        </form>
    </body>
</html>