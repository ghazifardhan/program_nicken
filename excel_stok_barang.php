<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=stok_barang.xls");
include ('koneksi.php')
?>

<table>
  <tr>
  <td><img src="logo_nicken.png" width="50px" height="50px"></td>
  <td align="center"><h4>PT.Pratama Inti Distribusindo</h4></td>
  </tr>
</table>
<h4 align="center">Laporan Stok Persediaan Barang</h4>
<h5 align="center"><?php echo date("D, d M Y"); ?></h5>
<table border="1" class="table table-bordered">

    <tr>

        <td>Nama_Barang</td>
        <td>Stok Awal</td>
        <td>Stok keluar</td>
        <td>Stok Akhir</td>

    </tr>
    <?php

    $list_barang=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `barang`.`Nama_Barang`,
  `transaksi_detail`.`Qty`,
  `transaksi_detail`.`Harga`,
  `barang`.`stok_awal`,
  `barang`.`Stok`
FROM
  `transaksi_detail`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`");
    while($proses=mysqli_fetch_array($list_barang)){

        ?>
<tr>

    <td><?php echo $proses['Nama_Barang'];?></td>
    <td><?php echo number_format($proses['stok_awal'],0,',','.');?></td>
    <td><?php echo number_format($proses['Qty'],0,',','.');?></td>
    <td><?php echo number_format($proses['stok_awal'] - $proses['Qty'],0,',','.');?></td>


</tr>
    <?php } ?>
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
