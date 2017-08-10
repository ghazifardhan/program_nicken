<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=komisi_sales.xls");
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
  Sum(`transaksi`.`Jumlah`) AS `Jumlah`,
  `customer`.`Nama_Customer`,
  `salesman`.`Nama_Salesman`,
  `transaksi`.`No_transaksi`,
  `transaksi`.`Tgl_Tempo`,
  `transaksi`.`Tgl`,
  `customer`.`Id_Customer`
FROM
  `transaksi`
  INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
  INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman`
GROUP BY
  `transaksi`.`No_transaksi`,
  `transaksi`.`Tgl_Tempo`,
  `transaksi`.`Tgl`,
  `customer`.`Id_Customer`");
}
  ?>
<form method="POST"/>

<h3>Laporan Komisi Bayar Sales</h3>

<table border="1" class="table table-bordered">

    <tr>
        <td>No</td>
        <td>No transaksi</td>
        <td>Tanggal</td>
        <td>Nama Customer</td>
        <td>Nama Sales</td>
        <td>Jumlah</td>

    </tr>

    </tr>
    <?php
    $no=1;
    $total= 0;
    while($proses=mysqli_fetch_array($list_transaksi)){

    ?>
<tr>
    <td><?php echo $no++;?></td>
    <td><?php echo $proses['No_transaksi'];?></td>
    <td><?php echo $proses['Tgl'];?></td>

        <td><?php echo $proses['Nama_Customer'];?></td>
        <td><?php echo $proses['Nama_Salesman'];?></td>
    <td><?php echo $proses['Jumlah'];?></td>

</tr>

    <?php

    $total+=$proses['Jumlah'] * 0.02;
    } ?>
    <tr>
    <td colspan="5">Jumlah Komisi Bayar</td>
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
