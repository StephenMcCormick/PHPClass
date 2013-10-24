<?php

if(count($_POST))
        {
            if(array_key_exists("fullname", $_POST))
            {
                $fullname = $_POST["fullname"];
            }
            
            if(array_key_exists("email", $_POST))
            {
                $email = $_POST["email"];
            }
            
            if(array_key_exists("comments", $_POST))
            {
                $comments = $_POST["comments"];
            }
        }








?>