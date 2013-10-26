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
        
        if(!empty($errorMsg))
        {
            echo "<p>",$errorMsg,"</p>";
        }
        
        if(!empty($successMsg))
        {
            echo "<p>",$successMsg,"</p>";
        }
        
        ?>
        <div id="wrapper">
            <form name="signupform" action="signupprocess.php" method="post">

                Email: <input type="text" name="email" value="" size="35"/> <br />
                UserName: <input type="text" name="username" value=""/> <br />
                PassWord: <input type="password" name="password" value=""/> <br />

                <input type="submit" value="submit" />

            </form>
        </div>
    </body>
</html>
