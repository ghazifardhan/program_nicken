<?php
include("koneksi.php");

if(isset($_POST['cari'])){
  if($_POST['nama'] == "" && $_POST['Tgl1'] == "" && $_POST['Tgl2'] == ""){
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
   } else if($_POST['nama'] != "" && $_POST['Tgl1'] == "" && $_POST['Tgl2'] == ""){
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
      where `transaksi`.`Status` = 'Lunas' and `customer`.`Id_Customer` ='".$_POST['nama']."'");
   } else if($_POST['nama'] == "" && $_POST['Tgl1'] != "" && $_POST['Tgl2'] != ""){
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
      where `transaksi`.`Status` = 'Lunas' and `transaksi`.`Tgl` between '".$_POST['Tgl1']."' and '".$_POST['Tgl2']."'");
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
      where `transaksi`.`Status` = 'Lunas' and `customer`.`Id_Customer` ='".$_POST['nama']."' and `transaksi`.`Tgl` between '".$_POST['Tgl1']."' and '".$_POST['Tgl2']."'");
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
include('header.php');
?>
<form method="POST">
<table>
<tr><td><select name="nama" class="form-control"/>
    <option value="">Semua Customer</option>
    <?php  $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from customer");
    while($list=mysqli_fetch_array($data)){ ?>


    <option value="<?php echo $list['Id_Customer'];?>"><?php echo $list['Nama_Customer'];?></option>
    <?php  } ?>
</select></td>
<td>Tanggal <input type="text" class="form-control datepicker" name="Tgl1"> s/d <input type="text" class="form-control datepicker" name="Tgl2"></td>
<td><input type="submit" name="cari" class="btn btn-danger"></td></tr>
</table>

<div id="print-area" class="print-area">
<div style="text-align:right;"><a class="btn btn-info no-print" href="javascript:printDiv('print-area');">Print</a></div>
<br>
<div style="text-align:right;"><a class="btn btn-success" href="excel_komisi.php?cari=<?php echo $_POST['cari'];?>&nama=<?php echo $_POST['nama']; ?>&Tgl1=<?php echo $_POST['Tgl1']; ?>&Tgl2=<?php echo $_POST['Tgl2']; ?>">Download Exel</a></div>

<table>
        <tr>
        <td><img src="logo_nicken.png" width="50px" height="50px"></td>
        <td align="center"><h4>PT.Pratama Inti Distribusindo</h4></td>
        </tr>
    </table>
<h4 align="center">Laporan Komisi Bayar Sales</h4>
<h5 align="center"><?php echo date("D, d M Y"); ?></h5>
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
    <td><?php echo number_format($proses['Jumlah']);?></td>

</tr>

    <?php

    $total+=$proses['Jumlah'] * 0.02;
    } ?>
    <tr>
    <td colspan="5">Jumlah Komisi Bayar</td>
    <td><?php echo number_format($total);?></td>
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
</form>

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
    $(".datepicker").datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                changeMonth: true,
                changeYear: true
            });

}
</script>


<style>

.print-area {border:1px solid red;padding:1em;margin:0 0 1em}
</style>

<?php
include('footer.php');
?>
<script type="text/javascript">
$(document).ready(function(){

    $(".datepicker").datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                changeMonth: true,
                changeYear: true
            });
    });
</script>
