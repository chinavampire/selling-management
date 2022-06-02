<?php
include('../../conn.php');
$table="0enblog";
$title = $_POST['title'];
$category = $_POST['category'];
$check = "select * from $table where title='$title' and category='$category'";
$check = mysqli_query($conn,$check);
$return="";
while($checked = mysqli_fetch_array($check)){
$return="exist";
}
echo $return;
?>