<?php include 'dependency.php'; ?>
<?php

    $username = filter_input(INPUT_POST, "username"); // get the username from the form

    $found = false; // default
    $msg = "Must enter a valid username."; //default
    
    if(is_string($username) && !empty($username)) // if the username is not null and is string
    {
        $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root",""); // create conection

        $statement = $db->prepare('select * from login where username = :username'); // prepare statment
        $statement->bindParam(':username', $username, PDO::PARAM_STR); // bind username to username
        $statement->execute(); // excecute the line
        $result = $statement->fetch(PDO::FETCH_ASSOC); // take results from search


        if(is_array($result) && count($result)) // if there are results
        {
            $found = true; // username was found
            $msg = " has been taken."; // it has been taken
        }
        else // if nothing was returned
        {
            $found = false; // username is available
            $msg = " is available";
        }
    }

    $results = array(
            'msg' => $msg,
            'found' =>  $found,
            'username' => $username
        );
    
    echo json_encode($results); // send stuff back and what not
    
    
 ?>       