<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guestbook Login</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        
            Login::processLogin();

        ?>
        <div id="wrapper">
            <form action="#" method="post">
                Passcode <input type="password" name="passcode" value="" />
                <br />
                <input type="submit" value="submit" />
            </form>
        </div>
        
    </body>
</html>
