<?php
include('../../conn.php');
$table="0enitem";
$name = $_POST['name'];
$category = $_POST['category'];
$spec = $_POST['spec'];
$check = "select * from $table where name='$name' and category='$category' and spec='$spec'";
$check = mysqli_query($conn,$check);
$return="";
while($checked = mysqli_fetch_array($check)){
$return="exist";
}
echo $return;
?>