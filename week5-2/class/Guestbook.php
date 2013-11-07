<?php

class Guestbook extends DB {
    
    protected $errors = array();
    
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
            $results = array_reverse($results);
           echo "<table border='1'>"; //starts the table
            
            foreach($results as $row) //fills the table row by row
            {
                echo "<tr> <td>"; //creats new row in the table
                echo $row["name"]; //full name is filled into the table
                echo "</td> <td>";
                echo $row["email"]; // email is filled into the table
                echo "</td> <td>";
                echo $row["comments"]; //comments is filled into the table
                echo "</td> </tr>"; // ends the row
            }
            echo "</table>"; // ends the table
        }
        else
        {
            echo '<p> No Comments Posted </p>';
        }
    }
    
    public function processGuestbook()
    {
        $this->emailEntryIsValid();
        $this->nameEntryIsValid();
        $this->commentEntryIsValid();
        //check post data
        //put into database
        
        return ( count($this->errors) ? false : true );
    }
    
    
    public function emailEntryIsValid() {
        if (array_key_exists("email", $_POST) )
        {
            if ( !Validator::emailIsValid($_POST["email"]) )
            {
                $this->errors["email"] = "Email is not valid!"; 
            }
        }
        else
        {
            $this->errors["email"] = "Email is required!"; 
        }
        
        return ( empty($this->errors["email"]) ? true : false ); 
    }
    
    public function nameEntryIsValid() {
        if (array_key_exists("name", $_POST) )
        {
            if ( !Validator::nameIsValid($_POST["name"]) )
            {
                $this->errors["name"] = "name is not valid!"; 
            }
        }
        else
        {
            $this->errors["name"] = "name is required!"; 
        }
        
        return ( empty($this->errors["name"]) ? true : false );
    }
    
    public function commentEntryIsValid() {
        if (array_key_exists("comment", $_POST) )
        {
            if ( !Validator::commentsIsValid($_POST["comment"]) )
            {
                $this->errors["comment"] = "comment is not valid!";
            }
        }
        else
        {
            $this->errors["comment"] = "comment is required!"; 
        }
        
        return ( empty($this->errors["comment"]) ? true : false );
    }
    
    
    public function saveEntry() {        
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('insert into guestbook set name = :nameValue, email = :emailValue, comments = :commentsValue');
            $stmt->bindParam(':nameValue', $_POST["name"], PDO::PARAM_STR);
            $stmt->bindParam(':emailValue', $_POST["email"], PDO::PARAM_STR);
            $stmt->bindParam(':commentsValue', $_POST["comment"], PDO::PARAM_STR); 
            $stmt->execute();  // if everything was excecuted corectly
        }
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
} // end Guestbook class
?> 
