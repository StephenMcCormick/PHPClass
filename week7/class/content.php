<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if ( !isset($_SESSION['count']) ) {
    $_SESSION['count'] = 0;
}

$_SESSION['count']++;

$test = filter_input(INPUT_POST, "login");

 $passed = false;
 $msg = "login is not valid";
 
if (is_string($test) ) {
    $passed = true;
    $msg = "login is valid";
}

$results = array(
            'msg' => $msg,
            'passed' =>  $passed,
            'login' => $test,
            'attempts' => $_SESSION['count']
        );

echo json_encode($results);






//echo "<table border='4'><tr><th>row</th></tr><tr><td>1</td></tr></table>";