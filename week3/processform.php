<?php

    include 'validator.php'; // this calls in the validator php file

    $valObj = new Validator(); // this creats a usable object to call the validator file

    $fullname = "";
    $email = "";
    $comments = "";

    if(count($_POST))
    {
        if(array_key_exists("fullname", $_POST))
        {
            $fullname = $_POST["fullname"];
        }

        if(array_key_exists("email", $_POST))
        {
            $email = $_POST["email"];
        }

        if(array_key_exists("comments", $_POST))
        {
            $comments = $_POST["comments"];
        }
    } //-- end of count if statment --

    if($valObj->isFullNameValid($fullname))
    {
        echo"<p>Full Name is good</p>";
    }
    else
    {
        echo"<p>Full Name is not valid</p>";
    }
    
    
    if($valObj->isFullNameValid($fullname) && !empty($email) && !empty($comments))
    {
        $dbh = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");

        try
        {
            $stmt = $dbh->prepare('insert into week3 set fullname = :fullnameValue, email = :emailValue, comments = :commentsValue'); // this is preparing the statment
            $stmt->bindParam(':fullnameValue', $fullname, PDO::PARAM_STR); //binds information from the form to the variable in the statment
            $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
            $stmt->bindParam(':commentsValue', $comments, PDO::PARAM_STR);
            $stmt->execute(); // executes the statment that was prepared
            
            echo "<h3>Info Submited</h3><p><a href='index.php'>Back to form</a></p>";
        } // --end of try --
        catch (PDOException $e) 
        {
            echo "DataBase Error";
        } // -- end of catch --
    } 
    else 
    {
         echo "<h3>Info NOT Submited</h3><p><a href='index.php'>Back to form</a></p>";  
    } //-- end of empty try catch if statment --

?>