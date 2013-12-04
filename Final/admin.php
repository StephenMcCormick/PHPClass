<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        //unset($_SESSION["isLoggedin"])
        
        if( !isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"] != true )
        {
            header("Location:login.php");
        }
        
        if ( isset( $_GET["logout"]) && $_GET["logout"] == 1)
        {
            session_destroy();
            header("Location:login.php");
        }
        ?>
        
         <form name="mainform" action="admin.php" method="post">
            
            
            Title: <input type="text" name="title" /><br />            
            Theme: <input type="radio" name="theme" value="theme1"> Theme 1<br />
                   <input type="radio" name="theme" value="theme2"> Theme 2<br />
                   <input type="radio" name="theme" value="theme3"> Theme 3<br />
            Address: <input type="text" name="address" /><br />
            Phone: <input type="tel" name="phone" /><br />
            Email: <input type="text" name="email" /><br />
            About:<br /> <textarea cols="30" rows="10" name="about"></textarea><br />
            
          
            <input type="submit" value="Submit" />
            
            
        </form>
        <a href ="admin.php?logout=1">Logout</a>
        
    </body>
</html>