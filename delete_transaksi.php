<?php
include_once('koneksi.php');
$query=mysqli_query($GLOBALS["___mysqli_ston"], "delete from transaksi where Id_Transaksi='".$_GET[
'Id_Transaksi']."'");

$query_del_trans_detail = mysqli_query($GLOBALS["___mysqli_ston"], "delete from transaksi_detail where Id_Transaksi='".$_GET[
    'Id_Transaksi']."'");

if($query && $query_del_trans_detail)header("location:tampil_transaksi.php"); else die (mysqli_error($GLOBALS["___mysqli_ston"]));
?> 
