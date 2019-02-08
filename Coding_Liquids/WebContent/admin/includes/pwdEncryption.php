<?php

/*Password encryption code*/
$hashFormat = "$2a$07$";  //hashFormat for BLOWFISH algorithm
$salt = "iAuUssgmehjrazitringF$";  //22 characters long salt string
$hashF_and_salt = $hashFormat.$salt;

?>