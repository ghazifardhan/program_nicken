<?php
include('koneksi.php');
include('header.php');
?>
<?php if($_SESSION['level'] != 'spv'){ ?>
<a href="input_barang.php" class="btn btn-danger">Tambah Data</a>
<?php } ?>
<form method="POST"/>
<table border="5" class="table table-bordered">

    <tr>
        <td>Id_Barang</td>
        <td>Nama_Barang</td>
        <td>Id_Category</td>
        <td>Stok</td>
        <td>Satuan_Barang</td>
    <?php
if($_SESSION['level'] != 'spv'){ ?>
        <td colspan="2">Action</td>
<?php } ?>
    </tr>
    <?php

    $list_barang=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `barang`.*,
  `category`.`Nama`
FROM
  `barang`
  INNER JOIN `category` ON `barang`.`Id_Category` = `category`.`Id_Category`;");
    while($proses=mysqli_fetch_array($list_barang)){

        ?>
<tr>
    <td><?php echo $proses['Id_Barang'];?></td>
    <td><?php echo $proses['Nama_Barang'];?></td>
    <td><?php echo $proses['Nama'];?></td>
    <td><?php echo $proses['stok_awal'];?></td>
    <td><?php echo $proses['Satuan_Barang'];?></td>
<?php
if($_SESSION['level'] != 'spv'){ ?>
    <td><a class="btn btn-warning" href="edit_barang.php?Id_Barang=<?php echo $proses['Id_Barang'];?>"/>
    Edit</a></td>

    <td><a class="btn btn-danger" href="delete_barang.php?Id_Barang=<?php echo $proses['Id_Barang'];?>"/>
    Delete</a></td>
<?php } ?>
</tr>
    <?php } ?>
</table>
<?php
include('footer.php');
