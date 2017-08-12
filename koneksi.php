<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "nicken_litan_m";

($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $user, $password));
mysqli_select_db($GLOBALS["___mysqli_ston"], $database);
?>
