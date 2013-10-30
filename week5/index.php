<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
       $signup = new Signup();
        if (  $signup->userNameIsTaken("teslllllt") ) {
            echo '<p>user name is taken</p>';
        }
        
       if ( Validator::loginIsValid("test", "test")  ) {
           echo "yup its good";
           
       } else {
           echo 'nope its bad';
       }
       
        ?>
    </body>
</html>