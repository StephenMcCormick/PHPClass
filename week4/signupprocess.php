<?php

include 'Config.php';
include 'Validator.php';

$db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);

// this is like a one line if statment first returns a boolean ? mean do this if true : is like an or for if it returns false
$username = (isset($_POST["username"]) ? $_POST["username"] : "");
$email = (isset($_POST["email"]) ? $_POST["email"] : "");
$password = (isset($_POST["password"]) ? $_POST["password"] : "");

if(Validator::usernameIsValid($username) && Validator::emailIsValid($email) && Validator::passwordIsValid($password))
{
    try{
        $stmt = $db->prepare('insert into signup set username = :usernameValue, email = :emailValue, password = :passwordValue');
        
        $password = sha1($password);
        
        $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR); //binds information from the form to the variable in the statment
        $stmt->bindParam(':emailValue', $email, PDO::PARAM_STR);
        $stmt->bindParam(':passwordValue', $password, PDO::PARAM_STR);

        if($stmt->execute())
        {
            $successMsg =  "<h3>Info Submited</h3>";
        }
        else
        {
            $errorMsg = "<h3>Info <strong>NOT</strong> Submited</h3>";
        }

    } catch (PDOException $e) {
        echo "Database Error";
    }

}

include 'signup.php';

?>