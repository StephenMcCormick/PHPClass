<?php


class Validator {
    //put your code here
    
    public static function emailIsValid( $str ) {
       if ( is_string($str) && !empty($str) && preg_match("/[A-Za-z0-9_]{2,}+@[A-Za-z0-9_]{2,}+\.[A-Za-z0-9_]{2,}/",$str) != 0 ) {
           return true;
       }        
       return false; 
    }

    public static function usernameIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {
           return true;
       }        
       return false; 
    }

    public static function passwordIsValid( $str ) {
       if ( is_string($str) && !empty($str) ) {
           return true;
       }        
       return false; 
    }
    
      public static function loginIsValid( $username, $password ) {
        
        $password = sha1($password);
        $dbCls = new DB();
        $db = $dbCls->getDB();
        if ( NULL != $db ) {
            $stmt = $db->prepare('select * from signup where username = :usernameValue and password = :passwordValue limit 1');
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ( count($result) ) return true;
        }
        return false;
    }
    
    public static function signupEntryIsValid() {
        
        if ( count($_POST) ) {
            
        }
       
        return false;
    }
    
}