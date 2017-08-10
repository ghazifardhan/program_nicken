<?php
include_once('koneksi.php');
$query=mysqli_query($GLOBALS["___mysqli_ston"], "delete from transaksi where Id_Transaksi='".$_GET[
'Id_Transaksi']."'")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
if($query)header("location:tampil_transaksi.php"); else die (mysqli_error($GLOBALS["___mysqli_ston"]));
?> 
