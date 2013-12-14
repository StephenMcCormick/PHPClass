<?php

class WebSiteDB extends DB{
    
    protected $errors = array();
    
    public function entryIsValid(){
        $this->emailEntryIsValid();
        $this->titleEntryIsValid();
        $this->addressEntryIsValid();
        $this->phoneEntryIsValid();
        $this->aboutEntryIsValid();
                
        return ( count($this->errors) ? false : true );
    }
    
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
    
    public function titleEntryIsValid() {
        if (array_key_exists("title", $_POST) )
        {
            if ( !Validator::isString($_POST["title"]) )
            {
                $this->errors["title"] = "Title is not valid!"; // if the title is not valid then the error will be filled with this message
            }
        }
        else
        {
            $this->errors["title"] = "Title is required!"; // if the email is not entered then the error will be filled with this message
        }
        
        return ( empty($this->errors["title"]) ? true : false ); // if there are no errors then this will return true, if the error messege is filled with something it will return false
    }
    
    public function addressEntryIsValid() {
        if (array_key_exists("address", $_POST) )
        {
            if ( !Validator::isString($_POST["address"]) )
            {
                $this->errors["address"] = "Address is not valid!"; // if the title is not valid then the error will be filled with this message
            }
        }
        else
        {
            $this->errors["address"] = "Address is required!"; // if the email is not entered then the error will be filled with this message
        }
        
        return ( empty($this->errors["address"]) ? true : false ); // if there are no errors then this will return true, if the error messege is filled with something it will return false
    }
    
    public function phoneEntryIsValid() {
        if (array_key_exists("phone", $_POST) )
        {
            if ( !Validator::isInt($_POST["phone"]) )
            {
                $this->errors["phone"] = "Phone is not valid! must be 10 digits long."; // if the title is not valid then the error will be filled with this message
            }
        }
        else
        {
            $this->errors["phone"] = "Phone is required!"; // if the email is not entered then the error will be filled with this message
        }
        
        return ( empty($this->errors["phone"]) ? true : false ); // if there are no errors then this will return true, if the error messege is filled with something it will return false
    }
    
    public function aboutEntryIsValid() {
        if (array_key_exists("about", $_POST) )
        {
            if ( !Validator::isString($_POST["about"]) )
            {
                $this->errors["about"] = "About is not valid!"; // if the title is not valid then the error will be filled with this message
            }
        }
        else
        {
            $this->errors["about"] = "About is required!"; // if the email is not entered then the error will be filled with this message
        }
        
        return ( empty($this->errors["about"]) ? true : false ); // if there are no errors then this will return true, if the error messege is filled with something it will return false
    }
    
    
    
    public function saveEntry($userID) {
        if ( !$this->entryIsValid() ) return false; // make sure everything is valid one more time
        
        //$userID = $this->getUserID();
        intval($userID);
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('update page '
                    . 'set '
                    . 'title = :titleValue, '
                    . 'theme = :themeValue, '
                    . 'address = :addressValue, '
                    . 'phone = :phoneValue, '
                    . 'email = :emailValue, '
                    . 'about = :aboutValue '
                    . 'where user_id = :userIDValue;');
            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT);
            $stmt->bindParam(':titleValue', $_POST["title"], PDO::PARAM_STR);
            $stmt->bindParam(':themeValue', $_POST["theme"], PDO::PARAM_STR);
            $stmt->bindParam(':addressValue', $_POST["address"], PDO::PARAM_STR);
            $stmt->bindParam(':phoneValue', $_POST["phone"], PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $_POST["email"], PDO::PARAM_STR);
            $stmt->bindParam(':aboutValue', $_POST["about"], PDO::PARAM_STR);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                return true;
            }
        }
        return false; 
    }
    
    public function getUserID(){
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select user_id, email from users where email = :emailValue');
            $stmt->bindParam(':emailValue', $_POST["email"], PDO::PARAM_STR);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $return = $data['user_id'];
                return $return;
            }
        }
        //return false;
    }
    
    public function getUserWebSite($userID){
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select website, user_id from users where user_id = :user_idValue');
            $stmt->bindParam(':user_idValue', $userID, PDO::PARAM_STR);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $return = $data['website'];
                return $return;
            }
        }
        //return false;
    }
    
    public function defaultEntry() {
        
        $userID = $this->getUserID();
        
        $db = $this->getDB();
        if ( null != $db ) {
            
            $stmt = $db->prepare('insert into page '
                    . 'set user_id = :userIDValue, title = "Put Title Here", theme = "theme1", address = "Put Address Here", phone = "1111111111", email = :emailValue, about = "Put An About Here"');
            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT);
            //$stmt->bindParam(':titleValue', "Put Title Here", PDO::PARAM_STR);
            //$stmt->bindParam(':themeValue', "theme1", PDO::PARAM_STR);
            //$stmt->bindParam(':addressValue', "Put Address Here", PDO::PARAM_STR);
            //$stmt->bindParam(':phoneValue', "1111111111", PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $_POST["email"], PDO::PARAM_STR);
            //$stmt->bindParam(':aboutValue', "Put An About Here", PDO::PARAM_STR);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                return true;
            }
        }
        return false; 
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    
    
    
}
