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
            
            if($signupClass->entryIsValid()) // will call all the checking to make sure it is a valid signup form
            {
                $signupClass->saveEntry(); // if everything was good the entrys will save
                header("Location: login.php"); // send them to login.php if they signed up correctly
            } 
            else
            {
                $enteryErrors = $signupClass->getErrors(); // if something is wrong this will get the errors and display them 
            }
        }
        
        ?>
        
        <form name="signupform" action="signup.php" method="post">

            Website: <input type="text" name="website" /> <br />
                <?php 
                    if ( !empty($enteryErrors["website"]) )
                    {
                        echo '<p>',$enteryErrors["website"],'</p>'; // display errors
                    }       
                ?>
            Email: <input type="text" name="email" /> <br />
                <?php 
                    if ( !empty($enteryErrors["email"]) )
                    {
                        echo '<p>',$enteryErrors["email"],'</p>'; // display errors
                    }       
                ?>
            Password: <input type="password" name="password" /> <br />
                <?php 
                    if ( !empty($enteryErrors["password"]) )
                    {
                        echo '<p>',$enteryErrors["password"],'</p>'; // display errors
                    }       
                ?>
            <input type="submit" value="Submit" />

        </form>
        
    </body>
</html>