<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$query= "insert into wilayah(Nama)
value ('".$_POST['Wilayah']."')";


$proses=mysqli_query($GLOBALS["___mysqli_ston"], $query);
if($proses){
    header('location:tampil_wilayah.php');
}else{
    echo mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
include('header.php');
?>
<form method="POST"/>
<table class="table table-bordered">


    <tr>
    <td><Strong>Wilayah</strong></td>
    <td><input type="text" class='form-control' name="Wilayah"  ></ td>
    </tr>


    <tr>
    <td><input type="submit" value="Simpan" class='btn btn-danger'' name="Simpan" /></ td>
    </tr>
    </table>
    </form>
    <?php
    include('footer.php');
		?>
