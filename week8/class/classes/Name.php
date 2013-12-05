<?php

class Name extends DB {
    
    //todo: getname(id), getAllNames, updateName(id), deleteName(id), addName(id)
    
    public static function createName($data) {
        $dbc = new DB();
        $db = $dbc->getDB();
        if (count($data) ) {
           
            $name = $data["name"];
            
            $statement = $db->prepare('insert into name set name = :name');
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            if ( $statement->execute() ) {
                return $db->lastInsertId();
            }
        }
        return false;
        
    }
    
    
}
