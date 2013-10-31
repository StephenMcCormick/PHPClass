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
    </head>
    <body>
        <?php
        session_start();
        session_regenerate_id(true);
        
        if( empty($_SESSION["isLoggedIn"]) )
        {
            header("Location:login.php");
        }
        
        if ( isset( $_GET["logout"]) && $_GET["logout"] == 1)
        {
            session_destroy();
            header("Location:login.php");
        }
        
        ?>
        
        <h1>You made it</h1>
        
        <a href ="admin.php?logout=1">Logout</a>
        
    </body>
</html>
