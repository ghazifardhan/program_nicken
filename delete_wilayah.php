
<?php
include_once('koneksi.php');
$query=mysqli_query($GLOBALS["___mysqli_ston"], "delete from wilayah where Id_Wilayah='".$_GET[
'Id_Wilayah']."'")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
if($query)header("location:tampil_wilayah.php"); else die (mysqli_error($GLOBALS["___mysqli_ston"]));
?> 
