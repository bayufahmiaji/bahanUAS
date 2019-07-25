<?php

    require_once('koneksi.php');
    $student_id = $_GET['id'];
    $sqlSelect = "Select * from students where id = $student_id ";
    $result = $conn->query($sqlSelect);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <?php if($result->num_rows > 0 ) : ?>
        <table   style="padding: 50px;">
            <?php while($student = $result->fetch_assoc()) : ?>
            <tr>
                <td style="padding: 10px"><lable>NRP</lable></td>
                <td><input readOnly style="margin-left: 50px" type="text" name="student_code" value= "<?=  $student['student_code'] ?>" ></td>
            </tr>
            <tr>
                <td style="padding: 10px"><lable>Nama</lable></td>
                <td><input style="margin-left: 50px" type="text" name="name" value= "<?=  $student['name'] ?>" ></td>
            </tr>
            <tr>
                <!-- <td style="padding: 10px"><lable>Status</lable></td>
                <td ><input style="margin-left: 50px" type="text" name="status" value= "<?=  $student['status'] ? "Aktif" : "Tidak Aktif" ?>" ></td> -->
                <td style="padding: 10px"><label for="status">Status Mahasiswa</label></td>
                <td>
                    <select style="margin-left: 50px" name="status">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>            
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: right"><input type="submit" value="Update"></td>
            </tr>
            <?php endwhile ; ?>
        </table>  
    <?php endif ; ?>
    </form>
</body>
</html>

<?php

if(isset($_POST['student_code']) && isset($_POST['name']) && isset($_POST['status'])){
   $nrp = $_POST['student_code'] ; 
   $name = $_POST['name'];
   $status = $_POST['status'];
   
//    echo $nrp ." ".$name." ".$status;
   $sqlUpdate = "Update students set student_code = '$nrp' , name = '$name' , status = $status where id = $student_id";
   if($conn->query($sqlUpdate) === TRUE){
        header('location:student-data.php');
   }
   else{
       print("Error : " .$conn->query($sqlUpdate));
   }
}

?>