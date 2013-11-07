<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Guestbook</title>
    </head>
    <body>
        <?php
        
        Login::isLoggedIn();
        
        $gb = new Guestbook();
        $gb->displayGuestbook();
        
        ?>
        
        
        
    </body>
</html>
