<?php
include ("koneksi.php");
  include('header.php');
$query_header = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `transaksi`.*,
  `customer`.`Nama_Customer`,
  `salesman`.`Nama_Salesman`
FROM
  `transaksi`
  INNER JOIN `customer` ON `transaksi`.`Id_Customer` = `customer`.`Id_Customer`
  INNER JOIN `salesman` ON `transaksi`.`Id_Salesman` = `salesman`.`Id_Salesman` where `transaksi`.`Id_Transaksi` ='".$_GET['Id_Transaksi']."'");
  $data=mysqli_fetch_array($query_header);
$query_detail = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `transaksi_detail`.*,
  `barang`.`Nama_Barang`
FROM
  `transaksi_detail`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang` where `transaksi_detail`.`Id_Transaksi` ='".$_GET['Id_Transaksi']."'");
  $data_detail=mysqli_fetch_array($query_detail);

?>
<br>
<br>
<h1><center>Detail Pejualan</center></h1>
<div id="print-area" class="print-area">
<div style="text-align:right;"><a class="no-print" href="javascript:printDiv('print-area');">Print</a></div>
<table class="table table-bordered" border="1">
<tr>
<th>No Transaksi</th>
<th>Salesman</th>
<th>Nama Customer</th>
<th>Tanggal</th>
</tr>
<tr>
<td><?php echo $data['No_transaksi'];?></td>
<td><?php echo $data['Nama_Salesman'];?></td>
<td><?php echo $data['Nama_Customer'];?></td>
<td><?php echo $data['Tgl'];?></td>
</tr>
</table>
<table class="table table-bordered" border="1">
<tr>
<th>No </th>
<th>Nama Barang</th>
<th>Qty</th>
<th>Harga</th>
<th>Total</th>
</tr>
<?php
$no=1;
$query_detail = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT
  `transaksi_detail`.*,
  `barang`.`Nama_Barang`
FROM
  `transaksi_detail`
  INNER JOIN `barang` ON `transaksi_detail`.`Id_Barang` = `barang`.`Id_Barang` where `transaksi_detail`.`Id_Transaksi` ='".$_GET['Id_Transaksi']."'");
  while($data_detail=mysqli_fetch_array($query_detail)){
?>
<tr>
<td><?php echo $no++;?></td>
<td><?php echo $data_detail['Nama_Barang'];?></td>
<td><?php echo $data_detail['Qty'];?></td>
<td>Rp.<?php echo number_format($data_detail['Harga']);?></td>
<td>Rp.<?php echo number_format($data_detail['Harga'] * $data_detail['Qty']);?></td>
</tr>
  <?php } ?>
  <tr>
  <td colspan="4">Grand Total</td>
  <td>Rp.<?php echo number_format($data['Jumlah']);?></td>
  </tr>
</table>
</div>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
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

<?php
include('footer.php');
?>
