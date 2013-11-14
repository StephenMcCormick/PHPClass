<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ItemE</title>
        
        <style>
            .center
            {
                text-align: center;
                font-weight: bold;
                background-color: lightgray;
            }
            
            #wrapper
            {
                position:relative;
                margin:auto;
                width:600px;
                
            }
        </style>
    </head>
    <body>
        <?php
         /*
        * Please follow the instructions below.
        * 
          * It is very important to know how to connect to a database and
          * how to retrive data.  PDO in PHP makes it easier to connect
          * and access data.
          * 
          * below is code that will access an address book.  With the results
          * echo out the data in a table, list, etc.  the results are returned in
          * a multidimentional array, so the first set is a regular array and the 
          * inner array is a key=>value pair.
          * 
          * the for each loop is ideal.
          * 
        * 
        */

        
        $db = new PDO("mysql:host=localhost;port=3306;dbname=phplab","root","");

        $statement = $db->prepare('select * from addressbook');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        
        // put your code here
        
        if(count($result))
        {
           echo "<div id='wrapper'><table border='1'>"; //starts the table
           echo "<tr><td class='center'>ADDRESS</td><td class='center'>CITY"
           . "</td><td class='center'>STATE</td><td class='center'>ZIP</td>"
                   . "<td class='center'>NAME</td></tr>";
            
            foreach($result as $row) //fills the table row by row
            {
                echo "<tr> <td>"; // starts the row
                echo $row["address"]; 
                echo "</td> <td>";
                echo $row["city"]; 
                echo "</td> <td>";
                echo $row["state"]; 
                echo "</td> <td>";
                echo $row["zip"];
                echo "</td> <td>";
                echo $row["name"];
                echo "</td> </tr>"; // ends the row
            }
            echo "</table> </div>"; // ends the table
        }
        else
        {
            echo '<p> No data Posted </p>';
        }
        ?>
    </body>
</html>
