<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validator
 *
 * @author Stephen McCormick
 */
class Validator {
    
    public function _construct()
    {
          
    } // end of _construct function
    
    function isFullNameValid($fullname)
    {
        if (is_string($fullname) && !empty($fullname))
        {
            return true;
        } // end if
            return false;
    } // end of validate full name function
    
    function isEmailValid($email)
    {
        if (is_string($email) && !empty($email))
        {
            return true;
        } // end if
            return false;  
    } // end of validate email function
    
    function isCommentsValid($comments)
    {
        if (is_string($comments) && !empty($comments))
        {
            return true;
        } // end if
            return false;  
    } // end of validate email function
    
    
} // end of validator class
