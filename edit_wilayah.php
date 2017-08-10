<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE wilayah set
Nama='".$_POST['Nama']."'
where
Id_Wilayah='".$_POST['Id_Wilayah']."'");
if($query_update) {
    header("location:tampil_wilayah.php");
}else{
      echo mysqli_error($GLOBALS["___mysqli_ston"]);
      }
      }
$tampilan_data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from wilayah where
Id_Wilayah ='".$_GET['Id_Wilayah']."'");
$hasil_data=mysqli_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

    <tr>
        <td>Nama_Wilayah</td>
        <td><input Name="Nama" type="text" value="<?php echo $hasil_data['Nama'];?>"/></td>
    </tr>


        <input type="hidden" name="Id_Wilayah" value="<?php echo $hasil_data['Id_Wilayah'];?>"/>

    <tr>
        <td><input type="submit" name="save"/></td>
    </tr>
</table>
<?php
include('footer.php');
?>
