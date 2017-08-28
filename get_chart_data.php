<?php
header("Content-Type: application/json");
include('koneksi.php');



$month = date("m/Y");
$sales = mysqli_query($GLOBALS['___mysqli_ston'], "select Id_Salesman, Nama_Salesman from salesman");
$no = 0;
while($data_sales = mysqli_fetch_object($sales)){    
    $data = mysqli_query($GLOBALS['___mysqli_ston'], "select * from transaksi where Id_Salesman = '".$data_sales->Id_Salesman."'");
    while($datas = mysqli_fetch_object($data)){
        $datas__[] = $datas;
    }
    $w = $no++;
    $datas_[$data_sales->Id_Salesman] = $datas__;
    $datas___[$w]["id_sales"] = $data_sales->Id_Salesman;
    $datas___[$w]["nama_sales"] = $data_sales->Nama_Salesman ;
    $datas___[$w]["data_sales"] = $datas__;
    unset($datas__); 
}

//echo json_encode($datas___, true);
$GLOBALS['chart_data'] = $datas___;

?>