<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ItemF</title>
    </head>
    <body>
        <?php
        // put your code here
        
        
        /*
         * From all your notes and assignments from previous weeks, you should
         * be able to create an address book form that can be submited to this page
         * and with the data collected should be able to save to the database.
         * 
         * 1. Start by creating the form and making sure you can collect the data from
         * the $_POST super global.
         * 
         * 2. Validate the data so at least something is being entered correctly.
         * 
         * 3. Take the validated data and insert into the database with bindparam 
         * before excuting
         */
        
        if(count($_POST))
        {
            if( Validator::zipIsValid($_POST["zip"])
                    && Validator::nameIsValid($_POST["name"])
                    && Validator::stringIsValid($_POST["state"])
                    && Validator::stringIsValid($_POST["city"])
                    && Validator::stringIsValid($_POST["address"]) )
            {
                
                    $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
                
                   
                
                if ( null != $db ) 
                {
                    $stmt = $db->prepare('insert into addressbook set address = :addressValue, '
                            . 'city = :cityValue, '
                            . 'state = :stateValue, '
                            . 'zip = :zipValue, '
                            . 'name = :nameValue');
                    $stmt->bindParam(':addressValue', $_POST["address"], PDO::PARAM_STR);
                    $stmt->bindParam(':cityValue', $_POST["city"], PDO::PARAM_STR);
                    $stmt->bindParam(':stateValue', $_POST["state"], PDO::PARAM_STR);
                    $stmt->bindParam(':zipValue', $_POST["zip"], PDO::PARAM_STR);
                    $stmt->bindParam(':nameValue', $_POST["name"], PDO::PARAM_STR);
                    $stmt->execute();  
                }
                echo "it worked!";
            }
            else
            {
                echo "nope";
            }
        }
        
        
        
        ?>
        
        <form id="addressBook" action="#" method="post">
            address: <input type="text" name="address" value="" /><br />
            city: <input type="text" name="city" value="" /><br />
            state: <input type="text" name="state" value="" /><br />
            zip: <input type="text" name="zip" value="" /><br />
            name: <input type="text" name="name" value="" /><br />
            <br />
            <input type="submit" name="submitAddress" value="Submit" />
        </form>
        
    </body>
</html>
