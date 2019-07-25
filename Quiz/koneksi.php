<?php

    $dbservername = "localhost" ;
    $dbusername = "root" ; 
    $dbpassword = "" ; 
    $dbname = "inventory" ; 

    $conn = new mysqli($dbservername , $dbusername , $dbpassword , $dbname);

    if($conn->connect_error){
        die("Connection Error ".$conn->connect_error);
    }
?>