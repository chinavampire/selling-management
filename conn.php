<?php
$conn = @mysqli_connect("ip","user","password","database");
if (!$conn){
	die("database connected error:" . mysql_error());
}
ini_set("error_reporting","E_ALL & ~E_NOTICE");
mysqli_query($conn,"set character set 'utf8'");
mysqli_query($conn,"set names 'utf8'");
header("Content-type: text/html; charset=utf-8");
?>