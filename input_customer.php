<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$query= "insert into customer(Id_Customer,Nama_Customer,Id_Wilayah,Alamat_Customer,No_Telepon,Keterangan,Limit_Kredit,Status)
value ('" .$_POST['Id_Customer']."',
       '" .$_POST['Nama_Customer']."',
       '" .$_POST['Id_Wilayah']."',
       '" .$_POST['Alamat_Customer']."',
       '" .$_POST['No_Telepon']."',
       '" .$_POST['Keterangan']."',
       '" .$_POST['Limit_Kredit']."',
       '" .$_POST['Status']."')";


$proses=mysqli_query($GLOBALS["___mysqli_ston"], $query);
if($proses){
    header('location:tampil_customer.php');
}else{
    echo mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
include('header.php');
?>
<form method="POST"/>
<table class="table table-bordered">

<tr>
    <td><Strong>Id_Customer </strong></td>
    <td><input type="text" class='form-control' name="Id_Customer" / ></ td>
    </tr>

    <tr>
    <td><Strong>Nama_Customer</strong></td>
    <td><input type="text" class='form-control' name="Nama_Customer" / ></ td>
    </tr>

    <tr>
    <td><Strong>Nama_Wilayah</strong></td>
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
    <td><Strong>Alamat_Customer</strong></td>
    <td><input type="text" class='form-control' name="Alamat_Customer" / ></ td>
    </tr>

    <tr>
    <td><Strong>No_Telepon</strong></td>
    <td><input type="text" class='form-control' name="No_Telepon" / ></ td>
    </tr>

    <tr>
    <td><Strong>Keterangan</strong></td>
    <td><input type="text" class='form-control' name="Keterangan" / ></ td>
    </tr>

    <tr>
    <td><Strong>Limit_Kredit</strong></td>
    <td><input type="text" class='form-control' name="Limit_Kredit" / ></ td>
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

    <tr>
    <td><input type="submit" value="Simpan" class='btn btn-danger'' name="Simpan" /></ td>
    </tr>
    </table>
    </form>
    <?php
    include('footer.php'); 
