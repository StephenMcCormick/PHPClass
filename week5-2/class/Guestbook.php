<?php

class Guestbook extends DB {
    
    public function getGuestbookData()
    {
        $result = array();
        $db = $this->getDB();
        
        if( NULL != $db )
        {
            $stmt = $db->prepare('select name, email, comments from guestbook'); //prepare the MySQL code
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $result;
    } // end getGuestbookData function
    
    public function displayGuestbook()
    {
        $results = $this->getGuestbookData();
        
        if(count($results))
        {
            echo '<h2>Comments Posted </h2>';
            print_r($results);
        }
        else
        {
            echo '<p> No Comments Posted </p>';
        }
        
    }
    
} // end Guestbook class
?> 
