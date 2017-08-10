<?php
include_once('koneksi.php');
$query=mysqli_query($GLOBALS["___mysqli_ston"], "delete from category where Id_Category='".$_GET[
'Id_Category']."'")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
if($query)header("location:tampil_category.php"); else die (mysqli_error($GLOBALS["___mysqli_ston"]));
?> 
