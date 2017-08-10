<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$query= "insert into target_salesman(Id_Target,Keterangan)
value ('" .$_POST['Id_Target']."',
       '" .$_POST['Keterangan']."')";


$proses=mysqli_query($GLOBALS["___mysqli_ston"], $query);
if($proses){
    header('location:tampil_target.php');
}else{
    echo mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

<tr>
    <td><Strong>Id_Target</strong></td>
    <td><input type="text" class='form-control' name="Id_Target" / ></ td>
    </tr>

    <tr>
    <td><Strong>Keterangan</strong></td>
    <td><input type="text" class='form-control' name="Keterangan" / ></ td>
    </tr>


    <tr>
    <td><input type="submit" value="Simpan" class='btn btn-danger' name="Simpan" /></ td>
    </tr>
    </table>
    </form>
    <?php
    include('footer.php');
