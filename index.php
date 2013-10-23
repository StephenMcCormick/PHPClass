<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_GET["title"]; ?></title>
    </head>
    <body>
        <?php
        
        $p = "";
        if(count($_GET))
        {
            if (array_key_exists("p", $_GET))
            {
                $p = $_GET["p"];
            }
        }
        //echo count($_GET);
        //$_POST = array();
        //$_GET = array();
        //$_GET["page"] = "index";
        //$_GET["title"] = hello;
              //$key => value  
        //echo $_GET["page"], "<br />", $_GET["title"], "<br />", $_GET["p"];  
        
        echo "<h1>", $_GET["page"], "</h1>";
        if(strlen($p) > 0)
        {
           echo "<p>", $p, "</p>"; 
        }
        
        ?>
    </body>
</html>
