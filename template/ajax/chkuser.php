<?php
$table="0enuser";
$password0=$_POST['password'];
$password1=$_POST['repass'];
$getfocus="";
switch(true){
case ($password0<>$password1):
$getfocus="repass";
break;

default:
include('../../conn.php');
$account = $_POST['account'];
$check = "select * from $table where account='$account'";
$check = mysqli_query($conn,$check);
while($checked = mysqli_fetch_array($check)){
$getfocus="account";
}

}

echo $getfocus;
?>