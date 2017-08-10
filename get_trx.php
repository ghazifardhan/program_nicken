<?php
include('koneksi.php');
$no_transaksi=$_GET['no_transaksi'];
$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `customer`.`Nama_Customer`,
  `transaksi`.*,
  `customer`.`Id_Customer` AS `Id_Customer1`
FROM
  `transaksi`
  INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
WHERE
  `transaksi`.`Id_Transaksi` ='$no_transaksi'");
$fe=mysqli_fetch_array($query);
$nama=$fe['Nama_Customer'];
$id_customer=$fe['Id_Customer1'];
$tagihan=$fe['Jumlah'];
$sisa=$fe['Sudah_Dibayar'];
$sisa_tagihan = $tagihan - $sisa;
echo $nama.",".$id_customer.",".$sisa_tagihan.",".$tagihan;

?>
