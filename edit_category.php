<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE category set
Nama='".$_POST['Nama']."'
where
Id_Category='".$_POST['Id_Category']."'");
if($query_update) {
    header("location:tampil_category.php");
}else{
      echo mysqli_error($GLOBALS["___mysqli_ston"]);
      }
      }
$tampilan_data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from category where
Id_Category ='".$_GET['Id_Category']."'");
$hasil_data=mysqli_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

    <tr>
        <td>Nama</td>
        <td><input Name="Nama" type="text" value="<?php echo $hasil_data['Nama'];?>"/></td>
    </tr>

    <input type="hidden" name="Id_Category" value="<?php echo $hasil_data['Id_Category'];?>"/>

    <tr>
        <td><input type="submit" name="save"/></td>
    </tr>
</table>
<?php
include('footer.php');
?>
