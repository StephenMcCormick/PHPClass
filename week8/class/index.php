<?php include 'dependency.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $ab = new AddressBook();
        
        //print_r($_POST);
        //print_r($_GET);
        
        $ab->checkDeletes();
        $ab->checkUpdates();
        $ab->checkCreate();
        
        $ab->display();
        
        
        $name = "";
        $address = "";
        $city = "";
        $state = "";
        $zip = "";
        $addressModel = "";
        
        if ( $ab->isEdit() ) 
        {
          $addressModel = Address::getAddress($ab->getEditID());
          $name = $addressModel["name"];
          $address = $addressModel["address"];
          $city = $addressModel["city"];
          $state = $addressModel["state"];
          $zip = $addressModel["zip"];          
        }
        ?>
        
        <br clear="all" />
        <form action="#" method="post">
            name <input type="text" name="name" value="<?php echo $name ?>" /><br />
            Address <input type="text" name="address" value="<?php echo $address ?>" /><br />
            city <input type="text" name="city" value="<?php echo $city ?>" /><br />
            state <input type="text" name="state" value="<?php echo $state ?>" /><br />
            ZIP <input type="text" name="zip" value="<?php echo $zip ?>" /><br />
            <br />
            <?php 
                if ( $ab->isEdit() ) 
                {
                    echo '<input type="submit" name="edit" value="Update" />';                
                    echo '<input type="hidden" name="id" value="',$ab->getEditID(),'" />';                
                } else 
                {
                    echo '<input type="submit" name="create" value="ADD" />';
                }
            ?>
        </form>
        
    </body>
</html>
