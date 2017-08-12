<?php
include("koneksi.php");
if(isset($_POST['simpan'])){

$query="insert into tagihan(No_Tagihan,Id_Transaksi,Tgl,Jumlah,Id_Customer)
Value ('".$_POST["No_Tagihan"]."',
        '".$_POST["Id_Transaksi"]."',
        '".$_POST["Tgl"]."',
        '".$_POST["Jumlah"]."',
        '".$_POST["Id_Customer"]."')";

$proses=mysqli_query($GLOBALS["___mysqli_ston"], $query);

if ($proses){
    if($_POST['Jumlah'] == $_POST['sisa_tagihan']){
      $update_status = mysqli_query($GLOBALS["___mysqli_ston"], "update transaksi set Status = 'Lunas' where Id_Transaksi='".$_POST['Id_Transaksi']."'");
    }
    $status=0;
    $update_kontrak = mysqli_query($GLOBALS["___mysqli_ston"], "update transaksi set Sudah_Dibayar=Sudah_Dibayar+'".$_POST['Jumlah']."' where Id_Transaksi='".$_POST['Id_Transaksi']."'");
    $cek_pembayaran = mysqli_query($GLOBALS["___mysqli_ston"], "select count(Id_Tagihan) as cicilan from tagihan where Id_Customer ='".$_POST["Id_Customer"]."' and Id_Transaksi ='".$_POST['Id_Transaksi']."'");
    $pem_ke=mysqli_fetch_array($cek_pembayaran);
    if ($pem_ke['cicilan'] >= 3){
        $status=1;
    }
    if($status == 1){
        $cek_pembayaran = mysqli_query($GLOBALS["___mysqli_ston"], "select Jumlah,Sudah_Dibayar from transaksi where Id_Customer ='".$_POST["Id_Customer"]."' and Id_Transaksi ='".$_POST['Id_Transaksi']."'");
        $cek_status = mysqli_fetch_array($cek_pembayaran);
        $tagihan = $cek_status['Jumlah'];
        $Sudah_Dibayar = $cek_status['Sudah_Dibayar'];
        $hasil =$tagihan  - $Sudah_Dibayar;
    }
    if($hasil != 0){
        $update_status=mysqli_query($GLOBALS["___mysqli_ston"], "update customer set Status='Tidak Lancar' where Id_Customer ='".$_POST["Id_Customer"]."'");
        $update_status=mysqli_query($GLOBALS["___mysqli_ston"], "update transaksi set Status='BELUM LUNAS' where Id_Transaksi ='".$_POST['Id_Transaksi']."'");
    }elseif($hasil === 0){
        $update_status=mysqli_query($GLOBALS["___mysqli_ston"], "update customer set Status='Lancar' where Id_Customer ='".$_POST["Id_Customer"]."'");
        $update_status=mysqli_query($GLOBALS["___mysqli_ston"], "update transaksi set Status='LUNAS' where Id_Transaksi ='".$_POST['Id_Transaksi']."'");
    }

    header('location:tampil_tagihan.php');
}else{
    echo mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
include('header.php');
?>
<form method="post" enctype="multipart/form-data">
<table border="1" class="table table-bordered">
<tr>
<td>Transaksi</td>
<td> <select class="form-control" class="form-control" name="Id_Transaksi" id="no_transaksi">
<option value="">Pilih Transaksi</option>
<?php $pk=mysqli_query($GLOBALS["___mysqli_ston"], "select * from transaksi WHERE Status = 'BELUM LUNAS'");

while($data=mysqli_fetch_array($pk)){
    ?>
    <option value="<?php echo $data['Id_Transaksi'];?>"><?php echo $data['No_transaksi'];?></option>
<?php } ?>


</select></td>
</tr>
<tr>
<td>Atas Nama</td>
<td> <input type="text" class="form-control"  id="customer" readonly>
<input type="hidden" name="Id_Customer" id="id_customer">
</td>
</tr>
<tr>
<td>No Tagihan</td>
<td><input type    ="text" class="form-control" name="No_Tagihan"></td>

</tr>
<tr>
<td>Tanggal Tagihan</td>
<td><input type    ="text" class="form-control datepicker" name="Tgl"></td>
</tr>
<tr>
<td>Jumlah</td>
<td> <input type="text"class="form-control" name="Jumlah"></td>
</tr>
<tr>
<td>Jumlah Tagihan</td>
<td><input type="text"class="form-control" id="tagihan" readonly></td>
</tr>
<tr>
<td>Sisa_Tagihan</td>
<td><input type="text"class="form-control" id="top" name="sisa_tagihan" readonly></td>
</tr>
<tr>
<td><input type="submit"value="simpan"class="btn btn-danger" name="simpan"/></td>
</tr>
</table>
</form>


<?php
include('footer.php');

?>
<script type="text/javascript">
$(document).ready(function(){
$("#no_transaksi").click(function(){
    var no_transaksi=$("#no_transaksi").val();
    $.ajax({
        url:"get_trx.php",
        data:"no_transaksi="+no_transaksi,
        success:function(value){
            var data = value.split(",");
            $("#customer").val(data[0]);
            $("#id_customer").val(data[1]);
            $("#top").val(data[2]);
            $("#tagihan").val(data[3]);


            }


        });

    });
    $(".datepicker").datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                changeMonth: true,
                changeYear: true
            });
    });
</script>
