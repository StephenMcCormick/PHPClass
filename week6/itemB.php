<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item B</title>
    </head>
    <body>
        <?php
        
            /*
            * Please follow the instructions below.
            * 
             * The Form on the page will post the data entered back to this page.
             * The data sent will be populated by PHP into the Super Global $_POST
             * $_POST holds the data in a key=>value pair array.
            * 
             * 1. use the print_r() function on the $_POST super global.
             * you will notice the array is empty.  Enter data into the form and submit
             * Data has now been populated from the form into the $_POST array.
             * 
             * 2. You can now access the $_POST but you should only echo the results
             * or process anything is a post has been made. use the count() function to
             * echo the $_POST results for each input field.  there should be 3 results.
             * 
             * 3.  Comment out the email field and submit your form.  You should get a warning or
             * error.  Just a check to see that the POST had been populated with data is just 
             * not enough use this function filter_input(INPUT_POST,'email')
             * We normally would just get the data with $_POST['email']  Which ever way you
             * choose to is fine but the filter_input function will not throw an error when
             *  you try to get a $_POST key that does not exisit.  Submit the form with the
             * email field still commented out and see what it does.  Also check PHP.net for
             * more information about the function.
             * 
             *
            */
        
        // put your code here
        
        print_r($_POST); //1
        echo "<br/>";
        
        if(count($_POST)) //2
        {
            //print_r($_POST);
            $stuff = filter_input(INPUT_POST, 'email'); //3
            echo $stuff;
            
        }
        
        ?>
        
        
        <form action="#" method="post">            
           <!-- <label>Email</label> <input type="text" name="email" value="" /> <br /> -->
            <label>Password</label> <input type="password" name="password" value="" /> <br />
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>
