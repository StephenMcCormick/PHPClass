<?php

class Address extends DB {

    // todo getAddress(id), getAllAddresses(), updateAddress(id) deleteAddress(id), createAddress()

    public static function createAddress($data) {
        $dbc = new DB();
        $db = $dbc->getDB();
        if (count($data) ) {
           
            $address = $data["address"];
            $city = $data["city"];
            $state = $data["state"];
            $zip = $data["zip"];
            $name_id = $data["name_id"];
            
            $statement = $db->prepare('insert into address set address = :address, city = :city, state = :state, zip = :zip, name_id = :name_id');
            $statement->bindParam(':address', $address, PDO::PARAM_STR);
            $statement->bindParam(':city', $city, PDO::PARAM_STR);
            $statement->bindParam(':state', $state, PDO::PARAM_STR);
            $statement->bindParam(':zip', $zip, PDO::PARAM_STR);
            $statement->bindParam(':name_id', $name_id, PDO::PARAM_INT);
            if ( $statement->execute() ) {
                return true;
            }
        }
        return false;
    }

    public static function getAddress($id) {
        $dbc = new DB();
        $db = $dbc->getDB();
        
        $statement = $db->prepare('select * from address, name where address.id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getAllAddresses() {
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('select * from address, name where name.id = address.name_id');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function deleteAddress($id) {
        $dbc = new DB();
        $db = $dbc->getDB();
        $statement = $db->prepare('delete from address where id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ( $statement->execute() ) {
            return true;
        }
        
        return false;
    }
    
    public static function updateAddress($data) {
        
        $dbc = new DB();
        $db = $dbc->getDB();
        if (count($data) ) {
            
            $id = $data["id"];
            $address = $data["address"];
            $city = $data["city"];
            $state = $data["state"];
            $zip = $data["zip"];
            
            $statement = $db->prepare('update address set address = :address, city = :city, state = :state, zip = :zip where id = :id');
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':address', $address, PDO::PARAM_STR);
            $statement->bindParam(':city', $city, PDO::PARAM_STR);
            $statement->bindParam(':state', $state, PDO::PARAM_STR);
            $statement->bindParam(':zip', $zip, PDO::PARAM_STR);
            if ( $statement->execute() ) {
                return true;
            }
        }
        return false;
    }
    
    
}
