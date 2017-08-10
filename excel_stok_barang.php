<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=stok_barang.xls");
include ('koneksi.php')
?>
<h4>Laporan Stok Persediaan Barang</h4>
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
