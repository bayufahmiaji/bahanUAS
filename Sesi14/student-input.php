<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Student Input</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <form action="" method="POST">
        <table >
            <tr>
                <td style="padding: 10px"><label for="student-code">NRP</label></td>
                <td><input style="width: 250px" type="text" name="student_code" placeholder="Masukan NRP"></td>
            </tr>
            <tr>
                <td style="padding: 10px"><label for="student-code">Nama Mahasiswa</label></td>
                <td><input style="width: 250px" type="text" name="name" placeholder="Masukan Nama Mahasiswa"></td>
            </tr>
            <tr>
                <td style="padding: 10px"><label for="status">Status Mahasiswa</label></td>
                <td>
                    <select style="width: 255px" name="status">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>            
                </td>
            </tr>
            <tr>
                <td style="padding: 10px"></td>
                <td style="text-align: right"><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    require_once('koneksi.php');
    if(isset($_POST['student_code']) && isset($_POST['name']) && isset($_POST['status'])){
        $nrp = $_POST['student_code'];
        $name = $_POST['name'];
        $status = $_POST['status'];

        $sqlSelect = "INSERT into students( student_code , name , status) values('{$nrp}' , '{$name}' , $status)";
        if($conn->query($sqlSelect) === TRUE){
            header('location:student-data.php');
        }else{
            print("Error : ".$conn->error);
        }
    }
?>