<?php

class Login extends DB {
    //put your code here
        
    public function loginIsValid( $email, $password ) {
        
        $password = sha1($password);
        $db = $this->getDB();
        if ( NULL != $db ) {
            $stmt = $db->prepare('select * from users where email = :emailValue and password = :passwordValue limit 1');
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ( is_array($result) && count($result) ) return true;
        }
        return false;
    }
    
}

?>