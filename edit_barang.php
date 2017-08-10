<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE barang set
Nama_Barang='".$_POST['Nama_Barang']."',
Id_Category='".$_POST['Id_Category']."',
stok_awal='".$_POST['stok_awal']."',
Satuan_Barang='".$_POST['Satuan_Barang']."'
where
Id_Barang='".$_POST['Id_Barang']."'");
if($query_update) {
    header("location:tampil_barang.php");
}else{
      echo mysqli_error($GLOBALS["___mysqli_ston"]);
      }
      }



$tampilan_data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from barang where
Id_Barang ='".$_GET['Id_Barang']."'");
$hasil_data=mysqli_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

    <tr>
        <td>Nama_Barang</td>
        <td><input Name="Nama_Barang" type="text" value="<?php echo $hasil_data['Nama_Barang'];?>"/></td>
    </tr>

    <tr>
    <td><strong>Id_Category</strong></td>
    <td><select name="Id_Category"/>
    <option value=""/>------Pilih Categori------</option>
        <?php
        $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from category");
        while($list=mysqli_fetch_array($data)){ ?>
            <option value="<?php echo $list['Id_Category'];?>"/><?php echo $list['Nama'];?></option>

        <?php } ?>
    </select>
    </td>
    </tr>

    <tr>
        <td>Stok Awal</td>
        <td><input Name="stok_awal" type="text" value="<?php echo $hasil_data['stok_awal'];?>"/></td>
    </tr>

    <tr>
    <td><strong>Satuan_Barang</strong></td>
    <td><select name="Satuan_Barang"/>
            <option value="PCS"/>PCS</option>
            <option value="KARTON"/>KARTON</option>

            </select></td>

    <input type="hidden" name="Id_Barang" value="<?php echo $hasil_data['Id_Barang'];?>"/>

    <tr>
        <td><input type="submit" name="save"/></td>
    </tr>
</table>
<?php
include('footer.php'); 
