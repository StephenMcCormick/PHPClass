<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Oops!</title>
    </head>
    <body>
        <h1>Oops! There seem to have been an issue on the page.</h1>
        <p> Try starting back at the home page <a href="index.php">Back Home</a> </p>
        
        <?php
            
            $message = ( array_key_exists("msg", $_GET) ? $_GET["msg"] : "" );
        // put your code here
            if ( !empty($message) ) {
                mail("myemail@somehere.com", "PHP Error on my site", $message);
                echo $message;
            }
        ?>
    </body>
</html>