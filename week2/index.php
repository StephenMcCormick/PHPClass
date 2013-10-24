<!DOCTYPE html>
<!-- test to see if at home upload worked-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="week-2-lab.css" />
    </head>
    <body>
        
        <?php
            $usernameValue = "";
            $passwordValue = "";
            
            $usernameErr = "";
            $passwordErr = "";
            
            
            if ( count($_GET) ) {
            
                var_dump($_GET);
            }
            
            if ( count($_POST) ) {
                
                if ( !array_key_exists("username", $_POST) || empty($_POST["username"]) ) {
                   $usernameErr = "Please enter your username";                   
                } else {
                     $usernameValue = $_POST["username"];
                }
                
                if ( !array_key_exists("password", $_POST) || empty($_POST["password"]) ) {
                   $passwordErr = "Please enter your password";                   
                }
            }
        ?>
        <div id="wrapper">
            <form name="mainform" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">            
                <label>UserName</label> <input type="text" name="username" value="<?php echo $usernameValue;?>" /> <?php echo $usernameErr ?> <br />
                <label>Password</label> <input type="password" name="password" value="" /> <?php echo $passwordErr ?> <br />

                <input type="submit" value="Submit" />
            </form>
        </div>
        
    </body>
</html>