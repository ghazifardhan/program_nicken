<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>
<a href="input_salesman.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table border="5" class="table table-bordered">


    <tr>
        <td>Id_Salesman</td>
        <td>Nama_Salesman</td>
        <td>No_Telepon</td>
        <td>Id_Target</td>
        <td colspan="2">Action</td>
    </tr>
    <?php

    $list_salesman=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `salesman`.*,
  `target_salesman`.`Keterangan`
FROM
  `target_salesman`
  INNER JOIN `salesman` ON `target_salesman`.`Id_Target` =
    `salesman`.`Id_Target`");
    while($proses=mysqli_fetch_array($list_salesman)){

        ?>
<tr>
    <td><?php echo $proses['Id_Salesman'];?></td>
    <td><?php echo $proses['Nama_Salesman'];?></td>
    <td><?php echo '0'.number_format($proses['No_Telepon'], 0,',','.');?></td>
    <td><?php echo $proses['Keterangan'];?></td>

    <td><a class="btn btn-warning" href="edit_salesman.php?Id_Salesman=<?php echo $proses['Id_Salesman'];?>"/>
    Edit</a></td>

    <td><a class="btn btn-danger" href="delete_salesman.php?Id_Salesman=<?php echo $proses['Id_Salesman'];?>"/>
    Delete</a></td>
</tr>
    <?php } ?>
</table>
<?php
include('footer.php');
