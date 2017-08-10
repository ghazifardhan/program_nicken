<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
	if(empty($_POST['Stok'])){
		$_POST['Stok'] = 0;
	}
$query= "insert into barang(Id_Barang,Nama_Barang,stok_awal,Id_Category,Stok,Satuan_Barang)
value ('" .$_POST['Id_Barang']."',
       '" .$_POST['Nama_Barang']."',
       '" .$_POST['stok_awal']."',
       '" .$_POST['Id_Category']."',
       '" .$_POST['Stok']."',
       '" .$_POST['Satuan_Barang']."')";

$proses=mysqli_query($GLOBALS["___mysqli_ston"], $query);
if($proses){
header('location:tampil_barang.php');
}else{
    echo mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
include('header.php');
?>
<form method="POST"/>
<table class="table table-bordered">
<tr>
    <td><Strong>Id_Barang </strong></td>
    <td><input type="text" class='form-control' name="Id_Barang" / ></ td>
    </tr>

    <tr>
    <td><Strong>Nama_Barang </strong></td>
    <td><input type="text" class='form-control' name="Nama_Barang" / ></ td>
    </tr>

    <tr>
    <td><strong>Id_Category</strong></td>
    <td><select class='form-control' name="Id_Category"/>
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
    <td><strong>Stok Awal</strong></td>
    <td><input type="text" class='form-control' name="stok_awal" />
    <input type="hidden" class='' name="Stok" / >
    </td>
    </tr>

    <tr>
    <td><strong>Satuan_Barang</strong></td>
    <td><select class='form-control' name="Satuan_Barang"/>
            <option value="PCS"/>PCS</option>
            <option value="KARTON"/>KARTON</option>

            </select></td>


    <tr>
    <td><input type="submit" value="Simpan" class='btn btn-danger' name="Simpan" /></ td>
    </tr>
    </table>
    </form>
    <?php
    include('footer.php');
