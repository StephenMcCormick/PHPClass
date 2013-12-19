<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php
                    $userID = $_SESSION["userID"]; // gets the user ID from the session 
                    $adminLoadClass = new AdminLoad(); // new instince of adminload class
        
                    $data = $adminLoadClass->getWebPageData($userID);
                    echo $data["title"]; // this will take the title of the page and make it the title of the website for the user
                ?></title>
    </head>
    <body>
        <?php
        
        $userID = $_SESSION["userID"]; // gets the user ID from the session 
        $adminLoadClass = new AdminLoad(); // new instince of adminload class
        
        $data = $adminLoadClass->getWebPageData($userID);
        
        // this will be used to display the user web page name at the top
        $website = new WebSiteDB(); // websitedb class
        $userWebSite = $website->getUserWebSite($userID); // use the class to get user id
        
        
        //print_r($data);
        
        ?>
        <link rel="stylesheet" type="text/css" href="css/<?php echo $data["theme"]; ?>.css" /> <!-- this will load the theme that the user selected in the admin page -->
        
        <div id='header'>
            <h1 style="color:white; float:left;">SaaS Project</h1>
            
            <a href ="admin.php" style="color:white; float:right;">Back</a>
            
            <span style="color:white; float:right;">Welcome to <?php  // this will display the website name at the top in the header
                                    echo $userWebSite;
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    ?>
            </span>
            
        </div>
        
        <div id="wrapper">
            <h1 id="title"><?php echo $data["title"]; ?></h1>
            
            <h4 id="address"><?php echo $data["address"]; ?></h4>
            <p>We can be reached at: <strong><?php echo $data["phone"]; ?></strong></p>
            <p>Or by email: <strong><?php echo $data["email"]; ?></strong></p>
            <p>A little about us:</p>
            <p id="about"><strong><?php echo $data["about"]; ?></strong></p>
            
            
            
        </div>
        
        
    </body>
</html>
