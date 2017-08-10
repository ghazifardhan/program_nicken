<?php
include ('koneksi.php')

?>
<?php
include('header.php');
?>
<a href="input_category.php" class="btn btn-danger">Tambah Data</a>
<form method="POST"/>
<table border="5" class="table table-bordered">

    <tr>
        <td>Id_Category</td>
        <td>Nama</td>
        <td colspan="2">Action</td>
    </tr>
    <?php

    $list_category=mysqli_query($GLOBALS["___mysqli_ston"], "select * from category");
    while($proses=mysqli_fetch_array($list_category)){


        ?>
<tr>
    <td><?php echo $proses['Id_Category'];?></td>
    <td><?php echo $proses['Nama'];?></td>

    <td><a class="btn btn-warning" href="edit_category.php?Id_Category=<?php echo $proses['Id_Category'];?>"/>
    Edit</a></td>

    <td><a class="btn btn-danger" href="delete_category.php?Id_Category=<?php echo $proses['Id_Category'];?>"/>
    Delete</a></td>
</tr>
    <?php } ?>
</table>
<?php
include('footer.php');
?>
