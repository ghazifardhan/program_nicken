<?php
include ('koneksi.php');
if (isset($_POST['save'])){
$query_update=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE customer set
Nama_Customer='".$_POST['Nama_Customer']."',
Alamat_Customer='".$_POST['Alamat_Customer']."',
No_Telepon='".$_POST['No_Telepon']."',
Keterangan='".$_POST['Keterangan']."'
where
Id_Customer='".$_POST['Id_Customer']."'");
if($query_update) {
    header("location:tampil_customer.php");
}else{
      echo mysqli_error($GLOBALS["___mysqli_ston"]);
      }
      }
$tampilan_data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from customer where
Id_Customer ='".$_GET['Id_Customer']."'");
$hasil_data=mysqli_fetch_array($tampilan_data);

include('header.php');
?>
<form method="POST"/>
<table border="5" class="table table-bordered">

    <tr>
        <td>Nama_Customer</td>
        <td><input Name="Nama Customer" type="text" value="<?php echo $hasil_data['Nama_Customer'];?>"/></td>

    <td><select class='form-control' name="Id_Wilayah" />
        <option value=""/>------Pilih WIlayah------</option>
        <?php $a=mysqli_query($GLOBALS["___mysqli_ston"], "select * from wilayah");
        while($list=mysqli_fetch_array($a)){ ?>
            <option value="<?php echo $list['Id_Wilayah'];?>"/><?php echo $list['Nama'];?></option>
        <?php } ?>
        </select>
    </td>
    </tr>
    <tr>
        <td>Alamat_Customer</td>
        <td><input Name="Alamat Customer" type="text" value="<?php echo $hasil_data['Alamat_Customer'];?>"/></td>
    </tr>
    <tr>
        <td>No_Telepon</td>
        <td><input Name="No Telepon" type="text" value="<?php echo $hasil_data['No_Telepon'];?>"/></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td><input Name="Keterangan" type="text" value="<?php echo $hasil_data['Keterangan'];?>"/></td>
    </tr>
    <tr>
    <td><Strong>Limit_Kredit</strong></td>
    <td><input type="text" class='form-control' name="Limit_Kredit" value="<?php echo $hasil_data['Limit_Kredit'];?>" /></ td>
    </tr>

    <tr>
    <td><Strong>Status Pembayaran</strong></td>
    <td><select class='form-control' name="Status" / >
    <option value=""/>---Status----</option>
    <option value="Lancar"/>Lancar</option>
    <option value="Masalah"/>Masalah</option>
    </select>
    </td>
    </tr>


        <input type="hidden" name="Id_Customer" value="<?php echo $hasil_data['Id_Customer'];?>"/>

    <tr>
        <td><input type="submit" name="save"/></td>
    </tr>
</table>
<?php
include('footer.php');
?>
