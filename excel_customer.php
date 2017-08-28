<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=per_customer.xls");
include ('koneksi.php');
if(isset($_GET['cari'])){
  if($_GET['nama'] == "" && $_GET['Tgl1'] == "" && $_GET['Tgl2'] == ""){
      $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
        `wilayah`.`Nama`,
        `transaksi_detail`.*,
        `salesman`.`Nama_Salesman`,
        `barang`.`Nama_Barang`,
        `customer`.`Nama_Customer`
      FROM
        `wilayah`
        INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
          `wilayah`.`Id_Wilayah`
        INNER JOIN `salesman` ON `transaksi_detail`.`Sales` = `salesman`.`Id_Salesman`
        INNER JOIN `customer` ON `transaksi_detail`.`Customer` = `customer`.`Id_Customer`
        INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`");
  } else if($_GET['nama'] != "" && $_GET['Tgl1'] == "" && $_GET['Tgl2'] == ""){
      $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
        `wilayah`.`Nama`,
        `transaksi_detail`.*,
        `salesman`.`Nama_Salesman`,
        `barang`.`Nama_Barang`,
        `customer`.`Nama_Customer`
      FROM
        `wilayah`
        INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
          `wilayah`.`Id_Wilayah`
        INNER JOIN `salesman` ON `transaksi_detail`.`Sales` = `salesman`.`Id_Salesman`
        INNER JOIN `customer` ON `transaksi_detail`.`Customer` = `customer`.`Id_Customer`
        INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang` where `transaksi_detail`.Customer ='".$_GET['nama']."'");
  } else if($_GET['nama'] == "" && $_GET['Tgl1'] != "" && $_GET['Tgl2'] != ""){
      $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
        `wilayah`.`Nama`,
        `transaksi_detail`.*,
        `salesman`.`Nama_Salesman`,
        `barang`.`Nama_Barang`,
        `customer`.`Nama_Customer`
      FROM
        `wilayah`
        INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
          `wilayah`.`Id_Wilayah`
        INNER JOIN `salesman` ON `transaksi_detail`.`Sales` = `salesman`.`Id_Salesman`
        INNER JOIN `customer` ON `transaksi_detail`.`Customer` = `customer`.`Id_Customer`
        INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang` where `transaksi_detail`.`Tgl` between '".$_GET['Tgl1']."' and '".$_GET['Tgl2']."'");
  } else {
    $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
      `wilayah`.`Nama`,
      `transaksi_detail`.*,
      `salesman`.`Nama_Salesman`,
      `barang`.`Nama_Barang`,
      `customer`.`Nama_Customer`
    FROM
      `wilayah`
      INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
        `wilayah`.`Id_Wilayah`
      INNER JOIN `salesman` ON `transaksi_detail`.`Sales` = `salesman`.`Id_Salesman`
      INNER JOIN `customer` ON `transaksi_detail`.`Customer` = `customer`.`Id_Customer`
      INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang` where `transaksi_detail`.Customer ='".$_GET['nama']."' and `transaksi_detail`.`Tgl` between '".$_GET['Tgl1']."' and '".$_GET['Tgl2']."'");
  }
}else{
    $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `wilayah`.`Nama`,
  `transaksi_detail`.*,
  `salesman`.`Nama_Salesman`,
  `barang`.`Nama_Barang`,
  `customer`.`Nama_Customer`
FROM
  `wilayah`
  INNER JOIN `transaksi_detail` ON `transaksi_detail`.`Wilayah` =
    `wilayah`.`Id_Wilayah`
  INNER JOIN `customer` ON `transaksi_detail`.`Customer` = `customer`.`Id_Customer`
  INNER JOIN `salesman` ON `transaksi_detail`.`Sales` = `salesman`.`Id_Salesman`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`");
}
  ?>
<form method="POST"/>
<table>
<tr>
<td><img src="logo_nicken.png" width="50px" height="50px"></td>
<td align="center"><h4>PT.Pratama Inti Distribusindo</h4></td>
</tr>
</table>
<h4 align="center">Laporan Customer</h4>
<h5 align="center"><?php echo date("D, d M Y"); ?></h5>
<table border="1" class="table table-bordered">

    <tr>
        <td>No</td>
        <td>Nama Sales</td>
        <td>Nama Customer</td>
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

    <td><?php echo $proses['Nama_Salesman'];?></td>
    <td><?php echo $proses['Nama_Customer'];?></td>
    <td><?php echo $proses['Nama_Barang'];?></td>

        <td><?php echo number_format($proses['Harga'], 0, ',', '.');?></td>
        <td><?php echo number_format($proses['Qty'], 0, ',', '.');?></td>
    <td><?php echo number_format($proses['Harga'] * $proses['Qty'], 0, ',', '.');?></td>

</tr>

    <?php

    $total+=$proses['Harga'] * $proses['Qty'];
    } ?>
    <tr>
    <td colspan="6">Jumlah Barang Belanja</td>
    <td><?php echo number_format($total, 0, ',', '.');?></td>
    </tr>


</table>
  <table>
    <tr>
      <th style="height:100px">Disetujui Oleh</th>
      <th style="height:100px;padding-left:100px">Dibuat Oleh</th>
    </tr>
    <tr>
      <td>Indradi Agusaputra</td>
      <td style="padding-left:100px">Admin</td>
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
