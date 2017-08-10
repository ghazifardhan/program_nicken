<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=komisi_sales.xls");
include ('koneksi.php');
if($_GET['cari'] == 'submit'){
  if($_GET['nama'] == 'all'){
    $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
      `salesman`.*,
      `barang`.`Nama_Barang`,
      `transaksi_detail`.`Qty`,
      `target_salesman`.`Keterangan`,
      `transaksi_detail`.`Harga`
    FROM
      `salesman`
      INNER JOIN `transaksi_detail` ON `salesman`.`Id_Salesman` =
        `transaksi_detail`.`Sales`
      INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`
      INNER JOIN `target_salesman` ON `salesman`.`Id_Target` =
        `target_salesman`.`Id_Target`");
  } else {
  $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
    `salesman`.*,
    `barang`.`Nama_Barang`,
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
    }
}else{
    $list_transaksi=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `salesman`.*,
  `barang`.`Nama_Barang`,
  `transaksi_detail`.`Qty`,
  `target_salesman`.`Keterangan`,
  `transaksi_detail`.`Harga`
FROM
  `salesman`
  INNER JOIN `transaksi_detail` ON `salesman`.`Id_Salesman` =
    `transaksi_detail`.`Sales`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang`
  INNER JOIN `target_salesman` ON `salesman`.`Id_Target` =
    `target_salesman`.`Id_Target`");
}
  ?>
  <h3> Laporan Komisi Sales <h3>
  <table border="1" class="table table-bordered">

      <tr>
          <td>No</td>
          <td>Nama Sales</td>
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
      <td><?php echo $proses['Nama_Barang'];?></td>
          <td><?php echo number_format($proses['Harga'], 0, ",", ".");?></td>
          <td><?php echo number_format($proses['Qty'], 0, ",", ".");?></td>
      <td><?php echo number_format($proses['Harga'] * $proses['Qty'], 0, ",", ".");?></td>

  </tr>

      <?php
      $target= $proses['Keterangan'];
      $total+=$proses['Harga'] * $proses['Qty'];
      } ?>
      <tr>
      <td colspan="5">Jumlah Barang Belanja</td>
      <td><?php echo number_format($total, 0, ",", ".");?></td>
      </tr>
      <tr>
      <td colspan="5">Target Sales</td>
      <td><?php echo number_format($target, 0, ",", ".");?></td>
      </tr>
      <tr>
      <td colspan="5">Status</td>
      <td><?php
      if($total > $target){
          echo 'Target Tercapai';
      }else{
          echo 'Target Tidak Tercapai';
      }
      ?></td>
      </tr>
      <tr>
      <td colspan="5">Komisi</td>
      <td><?php
      if($total > $target){
          $komisi = ($total * 0.02);
          echo number_format($komisi, 0, ",", ".");
      }else{
          $komisi = 0;
          echo number_format($komisi, 0, ",", ".");
      }
      ?></td>
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
