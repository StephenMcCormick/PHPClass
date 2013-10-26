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
    } // end of validate email function
    
    public static function passwordIsValid($str)
    {
        if (is_string($str) && !empty($str))
        {
            return true;
        } // end if
            return false;   
    } // end of validate email function
            
            
}
?>