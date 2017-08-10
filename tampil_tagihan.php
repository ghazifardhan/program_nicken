<?php
error_reporting(0);
session_start();
include('koneksi.php');

if(isset($_SESSION['username']) && isset($_SESSION['authorized'])){
}else{
    echo ("<script type='text/javascript'>alert('Anda harus login');document.location='../index.php';</script>");
}
include('header.php');
?>

<a href="input_tagihan.php" class="btn btn-danger">Tambah Data</a>
<form method="post"/>
<table border="1" class="table table-bordered">

<tr>
<td>No</td>
<td>No Transaksi</td>
<td>Nama Customer</td>
<td>Tanggal Tagihan</td>
<td>Jumlah Tagihan</td>
<td>Jumlah Dibayar</td>
<td>Sisa Tagihan</td>
<td colspan="2">Action</td>

</tr>
<?php
$no=1;
$list_trx=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `tagihan`.*,
  `customer`.`Nama_Customer`,
  `transaksi`.`No_transaksi`,
  `transaksi`.`Jumlah` AS `Jumlah1`
FROM
  `transaksi`
  INNER JOIN `tagihan` ON `tagihan`.`Id_Transaksi` = `transaksi`.`Id_Transaksi`
  INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`");
while ($proses=mysqli_fetch_array($list_trx)){
    ?>
    <tr>
    <td><?php echo $no++;?></td>
    <td><?php echo $proses['No_transaksi'];?></td>
    <td><?php echo $proses['Nama_Customer'];?></td>
    <td><?php echo $proses['Tgl'];?></td>
    <td>Rp.<?php echo number_format($proses['Jumlah1']);?></td>
    <td>Rp.<?php echo number_format($proses['Jumlah']);?></td>

    <td>Rp.<?php echo number_format($proses['Jumlah1'] - $proses['Jumlah']);?></td>
    <td><a class="btn btn-warning" href="Update_tagihan.php?Id_Tagihan=<?php echo $proses['Id_Tagihan'];?>">Edit</a></td>
     <td><a class="btn btn-danger" href="delete_tagihan.php?Id_Tagihan=<?php echo $proses['Id_Tagihan'];?>">Delete</a></td>

    </tr>
<?php }?>

</table>


<?php
include('footer.php');

?>
