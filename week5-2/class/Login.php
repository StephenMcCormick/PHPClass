<?php

class Login {
    
    public static function processLogin()
    {
        $_SESSION["allowGuestbookAccess"] = false; // set session variable to false
            
        if( isset($_POST["passcode"]) && $_POST["passcode"] == "test" ) // if the passcode is set and correct
        {
            $_SESSION["allowGuestbookAccess"] = true; // session variable to true
            header("Location:guestbook.php"); // redirect to guestbook
        }
    } // end processLogin function
    
    public static function isLoggedIn()
    {
        if( !isset($_SESSION["allowGuestbookAccess"]) || $_SESSION["allowGuestbookAccess"] != true ) //if the variable is not set OR it is not true
        {
            header("Location:login.php"); // redirect to login page
        } 
    } // end isLoggedIn function
     
    
}  //end Login class
?>