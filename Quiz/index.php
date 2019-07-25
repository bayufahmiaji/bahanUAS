<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Home</title>
    <?php require_once('koneksi.php'); 
          $querySelect = "Select * from barang";
          $result = $conn->query($querySelect);
          $no = 1 ; 
    ?>
</head>
<body>
    <a href="barang_masuk.php">Input Barang Masuk</a>
    <?php if($result->num_rows > 0 ) : ?>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Stok</th>
        </tr>
        <?php while($barang = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $barang['kd_barang'] ?></td>
            <td><?= $barang['nama_barang'] ?></td>
            <td><?= $barang['stok'] ?></td>    
        </tr>
        <?php endwhile ; ?>
    </table>
    <?php endif ; ?>
</body>
</html>