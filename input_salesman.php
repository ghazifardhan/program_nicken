<?php
include ("koneksi.php");
if(isset($_POST['Simpan'])) {
$query= "insert into salesman(Id_Salesman,Nama_Salesman,No_Telepon,Id_Target)
value ('" .$_POST['Id_Salesman']."',
       '" .$_POST['Nama_Salesman']."',
       '" .$_POST['No_Telepon']."',
       '" .$_POST['Id_Target']."')";


$proses=mysqli_query($GLOBALS["___mysqli_ston"], $query);
if($proses){
    header('location:tampil_salesman.php');;
}else{
    echo mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
include('header.php');
?>
<form method="POST"/>
<table  class="table table-bordered">

<tr>
    <td><Strong>Id_Salesman</strong></td>
    <td><input type="text" class='form-control' name="Id_Salesman" / ></ td>
    </tr>

    <td><Strong>Nama_Salesman</strong></td>
    <td><input type="text" class='form-control' name="Nama_Salesman" / ></ td>
    </tr>

    <td><Strong>No_Telepon</strong></td>
    <td><input type="text" class='form-control' name="No_Telepon" / ></ td>
    </tr>


    <tr>
    <td><strong>Id_Target</strong></td>
    <td><select class='form-control' name="Id_Target"/>
    <option value=""/>------Pilih Target------</option>
        <?php
        $data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from target_salesman");
        while($list=mysqli_fetch_array($data)){ ?>
            <option value="<?php echo $list['Id_Target'];?>"/><?php echo $list['Keterangan'];?></option>

        <?php } ?>
    </select>
    </td>
    </tr>


    <tr>
    <td><input type="submit" value="Simpan" class='btn btn-danger' name="Simpan" /></ td>
    </tr>
    </table>
    </form>
    <?php
    include('footer.php'); 
