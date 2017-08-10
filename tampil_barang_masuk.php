<?php
include ('koneksi.php')
?>
<?php
include('header.php');
?>
<a href="input_barang.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table border="5" class="table table-bordered">

	<tr>
		<td>Id_Barang</td>
		<td>Nama_Barang</td>
		<td>Id_Category</td>
		<td>Stok</td>
		<td>Satuan_Barang</td>
		<td>Komisi</td>
		<td colspan="2">Action</td>
	</tr>
	<?php
	
	$list_barang=mysql_query("SELECT
  `barang`.*,
  `category`.`Nama`
FROM
  `barang`
  INNER JOIN `category` ON `barang`.`Id_Category` = `category`.`Id_Category`;");
	while($proses=mysql_fetch_array($list_barang)){
		
		?>
<tr>
	<td><?php echo $proses['Id_Barang'];?></td>
	<td><?php echo $proses['Nama_Barang'];?></td>
	<td><?php echo $proses['Nama'];?></td>
	<td><?php echo $proses['Stok'];?></td>
	<td><?php echo $proses['Satuan_Barang'];?></td>
	<td><?php echo $proses['Komisi'];?></td>
	<td><a class="btn btn-warning" href="edit_barang.php?Id_Barang=<?php echo $proses['Id_Barang'];?>"/>
	Edit</a></td>
	
	<td><a class="btn btn-danger" href="delete_barang.php?Id_Barang=<?php echo $proses['Id_Barang'];?>"/>
	Delete</a></td>
</tr>
	<?php } ?>
</table>
<?php
include('footer.php');