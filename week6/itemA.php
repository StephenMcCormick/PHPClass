<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item A</title>
    </head>
    <body>
        <?php
            /*
             * Please follow the instructions below.
             * 
               The link on the page is linked to the same page using a pound sign/hash tag
             * you can access the url params with the $_GET super global
             * $_GET gets populated by PHP when URL params are passed to the webpage.
             * $_GET is an array with key=>value pairs.
             * 
             * Just to clarify, super globals in PHP is variables that are always available 
             * for the programmer to use. $_GET is always available, but data is not populated
             * until url params are passed into the page.
             * 
             * 1. do a print_r (used for printing array values) on the super Global $_GET
             * when you enter the page week6/itemA.php you will see the array is empty
             * in order for PHP to populate the array you must pass values into the URL
             * 
             * 2. Use the count() function to determine if $_GET values have been passed in the url 
             * and populated with a key=>value pair.  To populate the $_GET you can click on the link 
             * below or you can enter your own key=value pairs.
             * Remember to start a url query use the question mark (?) followed by a key name, an equal sign
             * then a value.  You can continue to add more by then adding a ampersand & into the mix.
             * The limit is about 256 characters, but can vary based on the browser.
             * Data passed in a $_GET is not secure.
             * 
             * 3. Add two more url params to the link below.  Send a state and city.
             * 
             * 4. When values are passed to the URL please echo them back to the page.
             * you can access the populated $_GET variables by putting the key name in brackets after 
             * the variable. make sure to include quotes since the name is a string
             *  e.g $_GET['name']
             * to output use echo.  echo takes a string so if you want to concat a string with
             * a variable use the period(.)
             * e.g. echo 'Your name is ' . $_GET['name'];
             * 

            */
        // put your code here
        session_start();
        session_regenerate_id();
        
        print_r($_GET); // 1
        
        if(count($_GET)) //2
        {
            echo "your page is ".$_GET["page"]." your name is:".$_GET["name"]." you live in: ".$_GET["city"]." ".$_GET["state"]; //4
        }
        
        ?>        
        
        <a href="?page=demo&name=gabriel&city=warwick&state=RI">Click me</a> <!-- 3 -->

    </body>
</html>
