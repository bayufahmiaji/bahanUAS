<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Halaman Barang Masuk</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        .container {
            height: 250px;
            width: 500px;
            background-color: black;
            padding: 2px    
        }
        .container-body{
            height: 250px;
            width: 500px;
            background-color: white;
            /* text-align: center */
        }
        .container-form{
            padding-left: 50px;
            padding-top: 30px
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-body">
            <form action="" method="POST">
                <div class="container-form">
                    
                    <table>
                        <tr> 
                            <td style="padding: 10px"><label>Form Barang Masuk</label></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px"><label for="kd_barang">Kode Barang</label><input style="margin-left: 50px ; width: 200px;" type="text" name="kd_barang" placeholder="Isi Kode Barang"></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px"><label for="kd_barang">Jumlah</label><input style="margin-left: 88px ; width: 200px;" type="text" name="jumlah" placeholder="Isi Jumlah Barang"></td>        
                        </tr>
                        <tr>
                            <td style="text-align: right"><input style="margin-right: 10px ; background-color: #5555" type="submit" value="Simpan"></td>
                        </tr>
                    </table>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    require_once('koneksi.php');
    if(isset($_POST['kd_barang']) && isset($_POST['jumlah'])){
        // print($_POST['kd_barang'] . $_POST['jumlah']);
        $kode_barang = $_POST['kd_barang'];
        $jumlah = $_POST['jumlah'];

        $sqlSelect = "Select * from barang where `kd_barang` = '{$kode_barang}'" ; 
        $result = $conn->query($sqlSelect);
        $barang = $result->fetch_assoc();

        if($kode_barang == $barang['kd_barang']){
            if(!empty($_POST['kd_barang']) && !empty($_POST['jumlah'])){

            $idBarang = $barang['id'];
            $stok = $barang['stok'] + $jumlah;
            $sqlInsert = "INSERT into barang_masuk (tanggal , id_barang , jumlah ) values(current_timestamp(), $idBarang , $jumlah )";
            $sqlUpdate = "UPDATE barang SET `stok` = $stok WHERE `kd_barang` ='$kode_barang'";

                if($conn->query($sqlInsert) === TRUE && $conn->query($sqlUpdate)  === TRUE){
                    header('location:index.php');
                }
                else{
                    if($conn->query($sqlInsert) === FALSE){
                        echo "Error : ".$sqlInsert . "<br>" .$conn->error;
                    }else{
                        echo "Error : ".$sqlUpdate . "<br>" .$conn->error;
                    }
                }
            }else{
                echo "<br>Tidak Boleh Kosong"; 
            }
        }else{
        echo "<br>Tidak ada barang " . "<br>";
        // echo "Kode barang merupakan <b> CASE SENSITIVE </b><br>" ; 
        }    
    $conn->close(); 
    }



?>