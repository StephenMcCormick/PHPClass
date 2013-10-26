<?php

/**
 * Description of Validator
 *
 * @author Stephen McCormick
 */
class Validator {
    
    public static function emailIsValid($str)
    {
        if (is_string($str) && !empty($str))
        {
            return true;
        } // end if
            return false;   
    } // end of validate email function
            
    public static function usernameIsValid($str)
    {
        if (is_string($str) && !empty($str))
        {
            return true;
        } // end if
            return false;   
    } // end of validate username function
    
    public static function passwordIsValid($str)
    {
        if (is_string($str) && !empty($str))
        {
            return true;
        } // end if
            return false;   
    } // end of validate password function
    
    public static function loginIsValid($username, $password)
    {
        $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        $password = sha1($password);
        
        $stmt = $db->prepare('select * from signup where username = :usernameValue limit 1');
        $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        if(count($result))
        {
            if( $result[0]["password"] == $password )
            {
                return true;
            }
        }
        return false;
    }         
}

?>