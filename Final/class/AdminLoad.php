<?php

class AdminLoad extends DB{
    
    public function getWebPageData($userID){
        
        //$userID = $_SESSION["userID"];
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select * from page where user_ID = :userIDValue');
            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT); // use the user id to seach for data in table
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ( is_array($result) &&  count($result) )
            {
                return $result; // return the data that was retrieved in the table in array form
            }
        }
        //return false;
    }
    
    
    
    
}
