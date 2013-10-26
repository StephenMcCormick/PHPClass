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
        setcookie("lastvist", date("m/d/y"), time()+60*60*24*30);
        
        echo $_COOKIE["lastvist"];
        
        $_COOKIE[sha1("username")] = sha1("smccormick");
        
        print_r($_COOKIE);
        
        ?>
    </body>
</html>
