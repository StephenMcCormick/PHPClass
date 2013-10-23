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
        // put your code here
        
        //echo $_POST["fullname"];
        print_r($_POST)
        ?>
        
        <form name="mainform" action="index.php" method="post">
            Full Name: <input type="text" name="fullname" value=""/> <br />
            Email: <input type="text" name="email" value=""/> <br />
            Comments: <br /><textarea name="comments" cols="10" rows="5"> </textarea> <br />
            <input type="submit" value="submit" />
            
        </form>
          
    </body>
</html>
