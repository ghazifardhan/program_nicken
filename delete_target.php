<?php
include_once('koneksi.php');
$query=mysqli_query($GLOBALS["___mysqli_ston"], "delete from target_salesman where Id_Target='".$_GET[
'Id_Target']."'")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
if($query)header("location:tampil_target.php"); else die (mysqli_error($GLOBALS["___mysqli_ston"]));
?> 
