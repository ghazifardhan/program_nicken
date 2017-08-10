<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=per_perbarang.xls");
include ('koneksi.php');
if(isset($_POST['cari'])){
$list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `salesman`.*,
  `barang`.`Nama_Barang`,
  `barang`.`Komisi`,
  `transaksi_detail`.`Qty`,
  `target_salesman`.`Keterangan`,
  `transaksi_detail`.`Harga`
FROM
  `salesman`
  INNER JOIN `transaksi_detail` ON `salesman`.`Id_Salesman` =
    `transaksi_detail`.`Sales`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`
  INNER JOIN `target_salesman` ON `salesman`.`Id_Target` =
    `target_salesman`.`Id_Target` where `salesman`.`Id_Salesman` ='".$_POST['nama']."'");
}else{
    $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `wilayah`.`Nama`,
  `transaksi_detail`.*,
  `barang`.`Nama_Barang`
FROM
  `wilayah`
  INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
    `wilayah`.`Id_Wilayah`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`");
}
  ?>
<form method="POST"/>

<h4>Laporan Sales PT.Pratama inti distribusindo</h4>
<table border="1" class="table table-bordered">

    <tr>
        <td>No</td>
        <td>Nama Barang</td>
        <td>Harga</td>
        <td>qty</td>
        <td>jumlah</td>
    </tr>

    </tr>
    <?php
    $no=1;
    $total= 0;
    while($proses=mysqli_fetch_array($list_transaksi)){

    ?>
<tr>
    <td><?php echo $no++;?></td>

    <td><?php echo $proses['Nama_Barang'];?></td>

        <td><?php echo $proses['Harga'];?></td>
        <td><?php echo  $proses['Qty'];?></td>
    <td><?php echo $proses['Harga'] * $proses['Qty'];?></td>

</tr>

    <?php

    $total+=$proses['Harga'] * $proses['Qty'];
    } ?>
    <tr>
    <td colspan="4">Jumlah Barang Belanja</td>
    <td><?php echo $total;?></td>
    </tr>


</table>
</div>

<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script>
function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
<style>

.print-area {border:1px solid red;padding:1em;margin:0 0 1em}
</style>
