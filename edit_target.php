<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE target_salesman set
Keterangan ='".$_POST['Keterangan']."'

where
Id_Target='".$_POST['Id_Target']."'");
if($query_update) {
    header("location:tampil_target.php");
}else{
      echo mysqli_error($GLOBALS["___mysqli_ston"]);
      }
      }
$tampilan_data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from target_salesman where
Id_Target ='".$_GET['Id_Target']."'");
$hasil_data=mysqli_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

    <tr>
        <td>Keterangan</td>
        <td><input Name="Keterangan" type="text" value="<?php echo $hasil_data['Keterangan'];?>"/></td>
    </tr>

    <input type="hidden" name="Id_Target" value="<?php echo $hasil_data['Id_Target'];?>"/>

    <tr>
        <td><input type="submit" name="save"/></td>
    </tr>
</table>
<?php
include('footer.php');
