<?php

    require_once('koneksi.php');

    $idStudent = $_GET['id'];
    $sqlDelete = "Delete from students where id = $idStudent";

    if($conn->query($sqlDelete) === TRUE){
        header('location:student-data.php');
    }else{
        print("Error : ".$conn-error);
    }

?>