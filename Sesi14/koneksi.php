<?php

    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "academic";

    $conn = new mysqli($dbservername , $dbusername , $dbpassword , $dbname);

    if($conn->connect_error){
        print("Connect Error : ".$conn->connect_error);
    }

?>