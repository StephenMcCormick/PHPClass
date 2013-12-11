<?php


class Signup extends DB {
    
    protected $errors = array();

    public function websiteIsTaken( $website ) {        
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select website from users where website = :websiteValue limit 1');
            $stmt->bindParam(':websiteValue', $website, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);            
            if ( is_array($result) && count($result) ) {
                return true;
            }
        }
        return false;        
    }
    
    public function entryIsValid(){
        $this->emailEntryIsValid();
        $this->websiteEntryIsValid();
        $this->passwordEntryIsValid();
        
        return ( count($this->errors) ? false : true );
    }
    
    // this will check to see if the email that the user entered is valid
    public function emailEntryIsValid() {
        if (array_key_exists("email", $_POST) )
        {
            if ( !Validator::emailIsValid($_POST["email"]) )
            {
                $this->errors["email"] = "Email is not valid!"; // if the email is not valid then the error will be filled with this message
            }
        }
        else
        {
            $this->errors["email"] = "Email is required!"; // if the email is not entered then the error will be filled with this message
        }
        
        return ( empty($this->errors["email"]) ? true : false ); // if there are no errors then this will return true, if the error messege is filled with something it will return false
    }
    
    // this will check to see if the website that the user entered is valid
    public function websiteEntryIsValid() {
        if (array_key_exists("website", $_POST) )
        {
            if ( !Validator::websiteIsValid($_POST["website"]) )
            {
                $this->errors["website"] = "Website is not valid!";// if the website is not valid then the error will be filled with this message
            }
            if( $this->websiteIsTaken($_POST["website"]) == true ) 
            {
                $this->errors["website"] = "That Website has been taken!"; // if the website that the user entered is already in the database
            }
        }
        else
        {
            $this->errors["website"] = "Website is required!"; // requires a Website to be entered
        }
        
        return ( empty($this->errors["website"]) ? true : false );
    }
    
    public function passwordEntryIsValid() {
        if (array_key_exists("password", $_POST) ) // if the user entered a password
        {
            if ( !Validator::passwordIsValid($_POST["password"]) ) // if the password is NOT valid
            {
                $this->errors["password"] = "Password is not valid!"; // fill error message
            }
        }
        else
        {
            $this->errors["password"] = "Password is required!"; // if there is no password entered fill error message
        }
        
        return ( empty($this->errors["password"]) ? true : false );
    }
    
    public function saveEntry() {
        if ( !$this->entryIsValid() ) return false; // make sure everything is valid one more time
        
        $db = $this->getDB();
        $password = sha1($_POST["password"]); // sha1 to encript the password
        if ( null != $db ) {
            $stmt = $db->prepare('insert into users set website = :websiteValue, email = :emailValue, password = :passwordValue');
            $stmt->bindParam(':websiteValue', $_POST["website"], PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $_POST["email"], PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR); 
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                // to do: this is where i need to make the connection to the website database
                $websiteDBClass = new WebSiteDB(); // creats new instence of the websiteDB class file
            
                if($websiteDBClass->defaultEntry())// will call and fill website database with default info..... hopefully
                {
                    return true;
                }
            }
        }
        return false; 
    }
    
    public function getErrors() {
        return $this->errors;
    }
}


?>