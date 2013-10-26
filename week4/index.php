<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        
        include 'Validator.php';
        include 'Config.php';
        
        //$valObj = new Validator(); // this creats a usable object to call the validator file
        
        $testEmail = "mytestemail@nowhere.com";
        
        if(Validator::emailIsValid($testEmail))
        {
            echo "email is valid";            
        }
        else
        {
            echo "email is <strong>NOT</strong> valid";
        }
        
        $dbh = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        $stmt = $dbh->prepare('SELECT * FROM week3');
        $stmt->execute();
        
        $result = $stmt->fetchAll(); // fetachall() will get all the data and fill it into an array
        
        print_r($result);
        
        
        echo "<h1>",$_SESSION["counter"],"</h1>";
        ?>
    </body>
</html>
