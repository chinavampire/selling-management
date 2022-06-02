<?php
include('../../conn.php');
$return=0;
$usertable="0enuser";
$itemtable="0enitem";
$account=$_COOKIE['account'];
$password=$_COOKIE['password'];
$index=$_GET['index'];
$check = "select * from $usertable where account='admin' and password='$password' and active";
$check = mysqli_query($conn,$check);
if($checked = mysqli_fetch_array($check))
{
$checkitem = "select * from $itemtable where `index`='$index'";
$checkitem = mysqli_query($conn,$checkitem);
$checkitem = mysqli_fetch_array($checkitem);
$category=$checkitem['category'];
$name=$checkitem['name'];
$folderPath = "../../pic/item/".$index."-";
$totalFiles = glob($folderPath . "*");
foreach($totalFiles as $k=>$v){
unlink($v);
}
mysqli_query($conn,"delete from $itemtable where `index`='$index'");


$check = "select * from $itemtable where category='$category' and name='$name' group by category,name order by category";
$check = mysqli_query($conn,$check);
if($checked=mysqli_fetch_array($check))
{
$return=$checked['index'];
}
}
echo $return;
?>