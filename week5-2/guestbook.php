<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Guestbook</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        
        <div id="wrapper">
            <form action="#" method="post">
                Name: <input type="text" name="name" size="25" value="" />
                <?php 
                    if ( !empty($enteryErrors["name"]) )
                    {
                        echo '<p>',$enteryErrors["name"],'</p>';
                    }       
                ?>
                <br />
                Email: <input type="text" name="email" size="40"value="" />
                <?php 
                    if ( !empty($enteryErrors["email"]) )
                    {
                        echo '<p>',$enteryErrors["email"],'</p>';
                    }       
                ?>
                <br />
                Comment:<br />
                <textarea name="comment" rows="5" cols="40"></textarea>
                <?php 
                    if ( !empty($enteryErrors["comment"]) )
                    {
                        echo '<p>',$enteryErrors["comment"],'</p>';
                    }       
                ?>
                <br />

                <input type="submit" value="submit" />
            </form>
        
        
        <?php
        
        Login::isLoggedIn();
        
        $enteryErrors = array();
        
        $gb = new Guestbook();
        if(count($_POST))
        {
            if($gb->processGuestbook())
            {
                $gb->saveEntry();
                
            }
            else
            {
                $enteryErrors = $gb->getErrors();
            }
        }
        
        $gb->displayGuestbook();
        
        ?>
        </div>
    </body>
</html>
