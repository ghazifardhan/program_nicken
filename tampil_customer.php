<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>
<a href="input_customer.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table class="table table-bordered">

    <tr>
        <td>Id_Customer</td>
        <td>Nama_Customer</td>
        <td>Alamat_Customer</td>
        <td>No_Telepon</td>
        <td>Keterangan</td>
        <td>Limit Kredit</td>
        <td colspan="2">Action</td>
    </tr>
    <?php

    $list_customer=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `customer`.*,
  `wilayah`.`Nama`
FROM
  `customer`
  INNER JOIN `wilayah` ON `customer`.`Id_Wilayah` = `wilayah`.`Id_Wilayah`");
    while($proses=mysqli_fetch_array($list_customer)){

        ?>
<tr>
    <td><?php echo $proses['Id_Customer'];?></td>
    <td><?php echo $proses['Nama_Customer'];?></td>
    <td><?php echo $proses['Alamat_Customer'];?></td>
    <td><?php echo $proses['No_Telepon'];?></td>
    <td><?php echo $proses['Keterangan'];?></td>
    <td>Rp.<?php echo number_format($proses['Limit_Kredit']);?></td>

    <td><a class="btn btn-warning"href="edit_customer.php?Id_Customer=<?php echo $proses['Id_Customer'];?>"/>
    Edit</a></td>

    <td><a class="btn btn-danger" href="delete_customer.php?Id_Customer=<?php echo $proses['Id_Customer'];?>"/>
    Delete</a></td>
</tr>
    <?php } ?>
</table>
<?php
include('footer.php');
