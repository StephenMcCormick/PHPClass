<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style>
            form{
            border:1px solid black;
            width:300px;
            padding:15px;
            border-radius:1em;
            }

            #wrapper{
            position:relative;
            margin:auto;
            width:500px;
            height:800px;
            padding:10px;
            }
        </style>
        
    </head>
    <body>
        <?php
        
        session_start();
        session_regenerate_id(true);
        include 'Config.php';
        include 'Validator.php';
        
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
        
        //for when you want to avoid BOTs
        if( !empty($_POST["email"]) )
        {
            $_SESSION["wait"] = time() + Config::MAX_SESSION_TIME;
        }
        
        if(isset($_SESSION["wait"]) && $_SESSION["wait"] > time() - Config::MAX_SESSION_TIME)
        {
            echo "please come back later";
            exit();
        }

        $_SESSION["token"] = $token;
        
        $username = (isset($_POST["username"]) ? $_POST["username"] : "");
        $password = (isset($_POST["password"]) ? $_POST["password"] : "");
        
        if(count($_POST))
        {
            if( !empty($username) && !empty($password) && Validator::loginIsValid($username, $password) )
            {
                $_SESSION["isLoggedIn"] = true;
                header("Location:admin.php");
            }
            else
            {
                echo "<p>username or password are incorrect</p>";
            }
        }
        
        
        ?>
        
        <div id="wrapper">
            <form name="loginform" action="login.php" method="post">

                UserName: <input type="text" name="username" value=""/> <br />
                PassWord: <input type="password" name="password" value=""/> <br />
                
                <input type="hidden" name="token" value="<?php echo $token; ?>"/> <!-- avoid session hijacking-->
                <input type="hidden" name="email" value=""/> <!-- avoid bot attacks -->

                <input type="submit" value="submit" />

            </form>
        </div>
        
        
    </body>
</html>
