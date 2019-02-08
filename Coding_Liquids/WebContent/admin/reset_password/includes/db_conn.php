<?php
/**
 * Created by PhpStorm.
 * User: arkap
 * Date: 08-06-2018
 * Time: 04:23 PM
 */

    $db_host = "localhost";   //Change the values to actual DB address when
    $db_user = "root";        //deployed in real websites
    $db_pass = "";
    $db_name = "codingliquids";

    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

    if(!$conn){
        die("Cannot connect to Database");
    }

?>