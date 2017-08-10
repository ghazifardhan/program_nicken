<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$query= "insert into category(Id_Category,Nama)
value ('" .$_POST['Id_Category']."',
       '" .$_POST['Nama']."')";


$proses=mysqli_query($GLOBALS["___mysqli_ston"], $query);
if($proses){
    header('location:tampil_category.php');
}else{
    echo mysqli_error($GLOBALS["___mysqli_ston"]);
}
}include('header.php');
?>
<form method="POST"/>
<table class="table table-bordered">

<tr>
    <td><Strong>Id_Category </strong></td>
    <td><input type="text" class='form-control' name="Id_Category" / ></ td>
    </tr>

    <tr>
    <td><Strong>Nama</strong></td>
    <td><input type="text" class='form-control' name="Nama" / ></ td>
    </tr>


    <tr>
    <td><input type="submit" value="Simpan" class='btn btn-danger' name="Simpan" /></ td>
    </tr>
    </table>
    </form>
    <?php
    include('footer.php'); 
