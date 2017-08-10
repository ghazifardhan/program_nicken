<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>
<a href="input_wilayah.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table class="table table-bordered">

    <tr>
        <td>Id_Wilayah</td>
        <td>Nama</td>

        <td colspan="2">Action</td>
    </tr>
    <?php

    $list_customer=mysqli_query($GLOBALS["___mysqli_ston"], "select * from wilayah");
    while($proses=mysqli_fetch_array($list_customer)){

        ?>
<tr>
    <td><?php echo $proses['Id_Wilayah'];?></td>
    <td><?php echo $proses['Nama'];?></td>

    <td><a class="btn btn-warning"href="edit_wilayah.php?Id_Wilayah=<?php echo $proses['Id_Wilayah'];?>"/>
    Edit</a></td>

    <td><a class="btn btn-danger" href="delete_wilayah.php?Id_Wilayah=<?php echo $proses['Id_Wilayah'];?>"/>
    Delete</a></td>
</tr>
    <?php } ?>
</table>
<?php
include('footer.php'); 
