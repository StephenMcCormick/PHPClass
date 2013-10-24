<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
 
        <?php
        $dbh = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");
        $stmt = $dbh->prepare('SELECT * FROM week3');
        $stmt->execute();
        
        $result = $stmt->fetchAll(); // fetachall() will get all the data and fill it into an array
        
        if(count($result))
        {
            echo "<table border='1'>"; //starts the table
            
            foreach($result as $row) //fills the table row by row
            {
                
                echo "<tr> <td>"; //creats new row in the table
                echo $row["fullname"]; //full name is filled into the table
                echo "</td> <td>";
                echo $row["email"]; // email is filled into the table
                echo "</td> <td>";
                echo $row["comments"]; //comments is filled into the table
                echo "</td> </tr>"; // ends the row

                //print_r($row);
                //echo"<br />";
            }
            echo "</table>"; // ends the table
        }
        else
        {
            echo "No rows returned.";
        }


        ?>
        
        <form name="mainform" action="processform.php" method="post">
            
            Full Name: <input type="text" name="fullname" value=""/> <br />
            Email: <input type="text" name="email" value=""/> <br />
            Comments: <br /><textarea name="comments" cols="10" rows="5"></textarea> <br />
            
            <input type="submit" value="submit" />
            
        </form>
          
    </body>
</html>
