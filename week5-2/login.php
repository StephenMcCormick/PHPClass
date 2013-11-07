<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guestbook Login</title>
    </head>
    <body>
        <?php
        
            Login::processLogin();

        ?>
        
        <form action="#" method="post">
            Passcode <input type="password" name="passcode" value="" />
            <br />
            <input type="submit" value="submit" />
        </form>
        
    </body>
</html>
