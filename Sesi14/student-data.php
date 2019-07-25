<?php

    require_once('koneksi.php');

    $sqlSelect = "Select * from students";
    $result = $conn->query($sqlSelect);
    $no = 1 ; 

?>
<a href="student-input.php"> Input Data </a>
<?php if($result->num_rows > 0 ) : ?>
    <table border=1>
            <tr>   
                <th>No</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Status</th>
                <th> </th> 
            </tr>
            <?php while($student = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $student['student_code'] ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['status'] ? "Aktif" : "Tidak Aktif" ?></td>
                    <td>
                        <a href="student-update.php?id=<?php echo $student['id'] ?>">Ubah</a>||
                        <a href="student-delete.php?id=<?php echo $student['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endwhile ; ?>
    </table>
<?php endif ; ?>
