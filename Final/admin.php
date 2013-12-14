<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php
        
        //unset($_SESSION["isLoggedin"])
        
        //TODO: 
        //fill form with info from table ----------------------- good
        //validate data in form before updating row in table --- good enough
        //update row in table with form data ------------------- good
        //add an update button --------------------------------- good
        //add link to demo/display page
        //drink beer when done
        
        $message="";
        
        $userID = $_SESSION["userID"]; // gets the user ID from the session 
        $thisMore = new AdminLoad(); // new instince of adminload class
        
        
        $enteryErrors = array();
        
        if(count($_POST))
        {
            $adminClass = new WebSiteDB(); // creats new instence of the WebSiteDB class file
            
            if($adminClass->entryIsValid()) // will call all the checking to make sure it is a valid admin site form
            {
                $adminClass->saveEntry($userID); // if everything was good the entrys will save
                $message = "Everything updated Great!!!";
            } 
            else
            {
                $enteryErrors = $adminClass->getErrors(); // if something is wrong this will get the errors and display them 
            }
        }
        
        // this will be used to autofill the form with data from the table in the database
        $data = $thisMore->getWebPageData($userID); // call the function that will get the data from the table based on the user id
        
        // this will be used to display the user web page name at the top
        $website = new WebSiteDB(); // websitedb class
        $userWebSite = $website->getUserWebSite($userID); // use the class to get user id
        
        if( !isset($_SESSION["isLoggedin"]) && $_SESSION["isLoggedin"] != true ) // this will make sure the user is logged in
        {
            header("Location:login.php");
        }
        
        if ( isset( $_GET["logout"]) && $_GET["logout"] == 1) // if the user clicks logout they will go back to login page
        {
            session_destroy();
            header("Location:login.php");
        }
        
        if ( isset( $_GET["website"]) && $_GET["website"] == $userWebSite )
        {
            header("Location:demo.php?website=$userWebSite");
        }
        ?>
        
        <div id='header'>
            <h1 style="color:white; float:left;">SaaS Project</h1>
            
            <a href ="admin.php?logout=1" style="float:right;">Logout</a>
            
            <span style="color:white; float:right;">Welcome <?php  // this will display the website name at the top in the header
                                    echo $userWebSite;
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    ?>
            </span>
            
        </div>
        
        <div id="wrapper">
            <form name="mainform" action="admin.php" method="post">


               Title: <input type="text" name="title" value="<?php echo $data['title'];?>"/><br />
                       <?php 
                           if ( !empty($enteryErrors["title"]) )
                           {
                               echo '<p>',$enteryErrors["title"],'</p>'; // display errors
                           }       
                       ?>
               Theme: <select name="theme">
                       <?php    // this is your crazy work G
                           $themeArr = array ( "theme1" => "Theme 1", "theme2" => "Theme 2", "theme3" => "Theme 3");
                           foreach ($themeArr as $key => $value) 
                           {
                               echo '<option value="',$key,'"';
                               if( $data["theme"] == $key ) { 
                                   echo 'selected = "selected"';                              
                               }
                               echo '>',$value,'</option>';   
                           }
                       ?>
                      </select> <br />
                       <?php 
                           if ( !empty($enteryErrors["theme"]) )
                           {
                               echo '<p>',$enteryErrors["theme"],'</p>'; // display errors
                           }       
                       ?>
                      <!--<input type="radio" name="theme" value="theme1"> Theme 1<br />
                      <input type="radio" name="theme" value="theme2"> Theme 2<br />
                      <input type="radio" name="theme" value="theme3"> Theme 3<br />-->
               Address: <input type="text" name="address" value="<?php echo $data['address'];?>" /><br />
                       <?php 
                           if ( !empty($enteryErrors["address"]) )
                           {
                               echo '<p>',$enteryErrors["address"],'</p>'; // display errors
                           }       
                       ?>
               Phone: <input type="tel" name="phone" value="<?php echo $data['phone'];?>" /><br />
                       <?php 
                           if ( !empty($enteryErrors["phone"]) )
                           {
                               echo '<p>',$enteryErrors["phone"],'</p>'; // display errors
                           }       
                       ?>
               Email: <input type="text" name="email" value="<?php echo $data['email'];?>" /><br />
                       <?php 
                           if ( !empty($enteryErrors["email"]) )
                           {
                               echo '<p>',$enteryErrors["email"],'</p>'; // display errors
                           }       
                       ?>
               About:<br /> <textarea cols="30" rows="10" name="about"><?php echo $data['about'];?></textarea><br />
                       <?php 
                           if ( !empty($enteryErrors["about"]) )
                           {
                               echo '<p>',$enteryErrors["about"],'</p>'; // display errors
                           }       
                       ?>


               <input type="submit" value="Submit" /> <span><?php echo $message; ?>
               
               <a href ="admin.php?website=<?php echo $userWebSite; ?>" style="float:right;">View</a>

           </form>
           
        </div>
    </body>
</html>