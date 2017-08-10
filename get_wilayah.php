
<?php
include('koneksi.php');
$id=$_GET['Id_Customer'];
$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `customer`.*,
  `wilayah`.`Nama`
FROM
  `wilayah`
  INNER JOIN `customer` ON `customer`.`Id_Wilayah` = `wilayah`.`Id_Wilayah` where `customer`.Id_Customer='$id'");
$fe=mysqli_fetch_array($query);
$nama=$fe['Nama'];
$id_wilayah=$fe['Id_Wilayah'];

echo $nama.",".$id_wilayah;

?> 
