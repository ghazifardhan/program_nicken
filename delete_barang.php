<?php
include_once('koneksi.php');
$query=mysqli_query($GLOBALS["___mysqli_ston"], "delete from barang where Id_Barang='".$_GET[
'Id_Barang']."'")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
if($query)header("location:tampil_barang.php"); else die (mysqli_error($GLOBALS["___mysqli_ston"]));
?>  
