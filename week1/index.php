<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        $randcolor = array("red", "white", "blue");
        $phrase = array("this is phrase one", "this is another phrase", "one more for the road");
        
        function onLoad()
        {
            return rand(0, 2);
        }
        
        ?>
        <style>
            body{
                background-color: <?php echo $randcolor[onLoad()]; ?>;
            }
        </style>
    </head>
    <body>
        <?php
        
        echo $phrase[onLoad()];
        
        echo"<br/><br/>";
        
        $firstname = 'stephen'; //name variable
	$lastname = 'mccormick'; //name variable
	
	$fullname = $firstname . $lastname; //variable concatenated
	
	echo $fullname; //output variable
	
	
	
	
	$arr = array("one", "two", "three", "four", "five"); // array with values
	$arr2 = array("0"=>"one", "1"=>"two", "2"=>"three", "3"=>"four", "4"=>"five"); // array with keys and values
	$arraymulti = array(
		array("one1", "two1", "three1", "four1", "five1"),
		array("one2", "two2", "three2", "four2", "five2"),
		array("one3", "two3", "three3", "four3", "five3")
		); // multidimentional array
	
	
	$array = array(
		"1" => "PHP code tester Sandbox Online",  
        "foo" => "bar", 5 , 5 => 89009, 
		"case" => "Random Stuff",
		"PHP Version" => phpversion()
		);
              
	foreach( $array as $key => $value ){
		echo $key."\t=>\t".$value."\n";
	}
	
	print_r($array); //debuging formated

	var_dump($array); //debuging detailed
	
	
	//Explode is like pharsing a string into an array
	$words = "one two three";
	$new = explode(" ", $words);
	print_r($new);
	
	//sha1 good for password stuff
	$password = "qwerty";
	if(sha1($password) === "b1b3773a05c0ed0176787a4f1574ff0075f7521e")
	{
		echo "Password good";
	}

	//htmlentities returned the html entities 
	$htmlvariable = "<pre>this is a pre tag</tag><h1>heading 1 tag</h1>";
	echo htmlentities($htmlvariable);
	
	//md5 more stuff i dont get
	$letters = "qwerty";
	if(md5($letters) === "d8578edf8458ce06fbc5bb76a58c5ca4")
	{
		echo "letters good";
	}
	
	
	//strip_tags removes html tags
	$stuff = "<h1>this is a line</h1> <br>this is a new line</br>";

	$morestuff = strip_tags($stuff);

	echo $morestuff;
	
	
	//trim can remove cherecters from a string and white space
	$text = "           this is a string of text";
	echo trim($text);
	
	//ucwords makes the first letter of the word upercase
	$text = "this is a string of text";
	echo ucwords($text);
	
	//strlen is for the length of a string
	$text = "this is a string of text";
	echo strlen($text);
	
	//str_shuffle takes a string and shuffles it
	$text = "this is a string of text";
	echo str_shuffle($text);
	
	//ord returns the ASCII value of the first charecter
	$text = "this is a string of text";
	echo ord($text);
	
	
	//array_count_values will count and return the frequency a string or int apears
	$array = array("word", "and", 2, "and", "and", 2);
	print_r(array_count_values($array));
	// output = Array ( [word] => 1 [and] => 3 [2] => 2 )
	
	//array_flip will swap the key and values of an array
	$array = array("something", "new", "and", "fun", "and", "but"=>"and");
	print_r(array_flip($array));
	// output = Array ( [something] => 0 [new] => 1 [and] => but [fun] => 3 )
	
	//array_key_exists will test to see if a key is set within the array
	$array = array(0=>"zero", 1=>"one", 2=>"two");
	if(array_key_exists("0", $array) == true)
		echo "yes";
	else
		echo "no";
	// output is yes because 0 is an index key in the array
	
	//array_map will do a function to each index within the array
	$array = array("this", "will", "all", "be", "shuffled");
	print_r(array_map('str_shuffle', $array));
	
	
	//array_rand will select a random index or multiple indexes
	$array = array("this", "will", "all", "be", "shuffled");
	print_r(array_rand($array, 2));

	//array_push will add values into an array
	$array = array("this", "will", "all", "be", "shuffled");
	array_push($array, "add", "stuff");
	print_r($array);
	
	//in_array will search the values in an array for the givin value
	$array = array("this", "will", "all", "be", "shuffled");
	if(in_array("this", $array))
		echo "true";
	
	//shuffle will talk the values in an array and randomize the order of those values
	$numbers = array(1, 2, 3, 4, 5, 6, 7, 20);
	shuffle($numbers);
	foreach ($numbers as $number) {
		echo "$number ";
	}
	
	//count will count the number of values in an array
	$array = array("this", "will", "all", "be", "shuffled");
	print_r(count($array));
	// output is 5
	
	//sort will organize the values in an array 
	$numbers = array(3, 2, 5, 4, 7, 6, 1);
	sort($numbers);
	print_r($numbers);
	//output = Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 [6] => 7 )
	
	//is_array will test to see if the argument passed to it is an array
	$array = array("this", "will", "all", "be", "shuffled");
	if(is_array($array) == true)
		echo "yes";
	else
		echo "no";
        
        
        // -- E --
        
        date_default_timezone_set("America/New_York");
        
        function token()
        {
            return sha1(uniqid(mt_rand(), true));
        }
        
        $rows = 100;
        $col = 1;
        
        echo "<table border='1'>";
        
        for($tr=1;$tr<=$rows;$tr++)
        { 
            if (($tr % 2) == 0)
                {
                    echo "<tr bgcolor=#E6E6E6>";
                }
                else 
                {
                    echo "<tr bgcolor=#FFFFFF>";
                }
                for($td=1;$td<=$col;$td++)
                {
                    $date = date("F j, Y, g:i a");
                    echo "<td>".$date." ".token()."</td>"; 
                } 
            echo "</tr>"; 
        } 
        echo "</table>"; 
        
        
        // -- F --
        /*
         * F was moved to the top of the code for that background fun stuff
        $randcolor = array("red", "white", "blue");
        $phrase = array("this is phrase one", "this is another phrase", "one more for the road");
        
        function onLoad()
        {
            return rand(0, 2);
        }
        
        echo "color is: ",$randcolor[onLoad()]," ",$phrase[onLoad()]; 
         * */
         
        ?>
    </body>
</html>
