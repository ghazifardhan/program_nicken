<?php
include_once('koneksi.php');
$query=mysqli_query($GLOBALS["___mysqli_ston"], "delete from salesman where Id_Salesman='".$_GET[
'Id_Salesman']."'")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
if($query)header("location:tampil_salesman.php"); else die (mysqli_error($GLOBALS["___mysqli_ston"]));
?>
