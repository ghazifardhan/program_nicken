<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=komisi_bayar_sales.xls");
include ('koneksi.php');

if(isset($_GET['cari'])){
  if($_GET['nama'] == "" && $_GET['Tgl1'] == "" && $_GET['Tgl2'] == ""){
    $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
      `transaksi`.`Jumlah` AS `Jumlah`,
      `customer`.`Nama_Customer`,
      `salesman`.`Nama_Salesman`,
      `transaksi`.`No_transaksi`,
      `transaksi`.`Tgl_Tempo`,
      `transaksi`.`Tgl`,
      `transaksi`.`Status`,
      `customer`.`Id_Customer`
    FROM
      `transaksi`
      INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
      INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman`
     where `transaksi`.`Status` = 'Lunas'");
   } else if($_GET['nama'] != "" && $_GET['Tgl1'] == "" && $_GET['Tgl2'] == ""){
     $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
       `transaksi`.`Jumlah` AS `Jumlah`,
       `customer`.`Nama_Customer`,
       `salesman`.`Nama_Salesman`,
       `transaksi`.`No_transaksi`,
       `transaksi`.`Tgl_Tempo`,
       `transaksi`.`Tgl`,
       `transaksi`.`Status`,
       `customer`.`Id_Customer`
     FROM
       `transaksi`
       INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
       INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman`
      where `transaksi`.`Status` = 'Lunas' and `customer`.`Id_Customer` ='".$_GET['nama']."'");
   } else if($_GET['nama'] == "" && $_GET['Tgl1'] != "" && $_GET['Tgl2'] != ""){
     $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
       `transaksi`.`Jumlah` AS `Jumlah`,
       `customer`.`Nama_Customer`,
       `salesman`.`Nama_Salesman`,
       `transaksi`.`No_transaksi`,
       `transaksi`.`Tgl_Tempo`,
       `transaksi`.`Tgl`,
       `transaksi`.`Status`,
       `customer`.`Id_Customer`
     FROM
       `transaksi`
       INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
       INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman`
      where `transaksi`.`Status` = 'Lunas' and `transaksi`.`Tgl` between '".$_GET['Tgl1']."' and '".$_GET['Tgl2']."'");
   } else {
     $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
       `transaksi`.`Jumlah` AS `Jumlah`,
       `customer`.`Nama_Customer`,
       `salesman`.`Nama_Salesman`,
       `transaksi`.`No_transaksi`,
       `transaksi`.`Tgl_Tempo`,
       `transaksi`.`Tgl`,
       `transaksi`.`Status`,
       `customer`.`Id_Customer`
     FROM
       `transaksi`
       INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
       INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman`
      where `transaksi`.`Status` = 'Lunas' and `customer`.`Id_Customer` ='".$_GET['nama']."' and `transaksi`.`Tgl` between '".$_GET['Tgl1']."' and '".$_GET['Tgl2']."'");
   }
}else{
    $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `transaksi`.`Jumlah` AS `Jumlah`,
  `customer`.`Nama_Customer`,
  `salesman`.`Nama_Salesman`,
  `transaksi`.`No_transaksi`,
  `transaksi`.`Tgl_Tempo`,
  `transaksi`.`Tgl`,
  `transaksi`.`Status`,
  `customer`.`Id_Customer`
FROM
  `transaksi`
  INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
  INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman`
  where `transaksi`.`Status` = 'Lunas'");
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
    <td><?php echo number_format($proses['Jumlah'],0,',','.');?></td>

</tr>

    <?php

    $total+=$proses['Jumlah'] * 0.02;
    } ?>
    <tr>
    <td colspan="5">Jumlah Komisi Bayar</td>
    <td><?php echo number_format($total,0,',','.');?></td>
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
