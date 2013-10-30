<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $enteryErrors = array();
        
        if(count($_POST))
        {
            $signupClass = new Signup(); // creats new instence of the Signup class file
            
            if($signupClass->entryIsValid())
            {
                $signupClass->saveEntry();
                // you can show a save entery message and have a link to the login page 
                // or just redirect them to the login page
                // note: look into ''flash messages''
            } 
            else
            {
                $enteryErrors = $signupClass->getErrors();
            }
            
        }
        
        ?>
        
         <form name="mainform" action="signup.php" method="post">
            
            Email: <input type="text" name="email" /> <br />
            <?php 
                if ( !empty($enteryErrors["email"]) )
                {
                    echo '<p>',$enteryErrors["email"],'</p>';
                }       
            ?>
            Username: <input type="text" name="username" /> <br />
            <?php 
                if ( !empty($enteryErrors["username"]) )
                {
                    echo '<p>',$enteryErrors["username"],'</p>';
                }       
            ?>
            Password: <input type="password" name="password" /> <br />
            <?php 
                if ( !empty($enteryErrors["password"]) )
                {
                    echo '<p>',$enteryErrors["password"],'</p>';
                }       
            ?>
          
            <input type="submit" value="Submit" />
                        
        </form>
        
    </body>
</html>