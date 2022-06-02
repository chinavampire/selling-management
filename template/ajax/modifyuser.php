<?php
include('../../conn.php');
$table="0enuser";
$modify=$_GET['modify'];
$account=$_GET['account'];
$result="";

switch(true){
case ($modify==="activate"):
if(mysqli_query($conn,"update $table set active=1 where account='$account'"))
{
$result="activate";
}
break;

case ($modify==="vip"):
if(mysqli_query($conn,"update $table set vip=1 where account='$account'"))
{
$result="vip";
}
break;

case ($modify==="new"):
if(mysqli_query($conn,"update $table set vip=0,active=0 where account='$account'"))
{
$result="new";
}
break;

case ($modify==="reset"):
if(mysqli_query($conn,"update $table set password='123456' where account='$account'"))
{
$result="reset";
}
break;


default:



}





echo $result;

?>