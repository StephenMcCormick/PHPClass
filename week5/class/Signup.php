<?php


class Signup extends DB {
    //put your code here
    
    protected $errors = array();

    public function userNameIsTaken( $username ) {        
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select username from signup where username = :usernameValue limit 1');
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);            
            if ( is_array($result) && count($result) ) {
                return true;
            }
        }
        return false;        
    }
    
    public function entryIsValid(){
        
        $isValid = true;
        if( count($_POST) )
        {
            if (array_key_exists("email", $_POST) )
            {
                if ( !Validator::emailIsValid($_POST["email"]) )
                {
                    $this->errors["email"] = "Email is not valid!";
                    $isValid = false;
                }
            }
            else
            {
                $this->errors["email"] = "Email is required!";
                $isValid = false;
            }
        }
        else
        {
            $isValid = false;
        }
        
        return $isValid;
    }
    
    public function saveEntry() {
        
    }
    
    public function getErrors() {
        return $this->errors;
    }
}


?>