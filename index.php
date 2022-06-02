<?php
session_cache_limiter('private, must-revalidate');
session_start();



//注销登录
if(isset($_GET['action'])){
$act=$_GET['action'];

switch(true){
case ($act==="logout"):
setcookie("account","",time()-1);
setcookie("password","",time()-1);
$account="";
$password="";
$_COOKIE['account']="";
$_COOKIE['password']="";
if (isset($_POST['changepassword']))
{
$act="login";
}
break;

default:
$default="";
}




}



$indextable="0enindex";
$usertable="0enuser";
$itemtable="0enitem";
$blogtable="0enblog";
$abouttable="0enabout";
$indexslidertable="0enindexslider";
$userfunction='<li><a href="index.php?action=login">login</a></li>';
$pricefield="price0";
$showlog="";
$privilege="";

include('conn.php');



if (isset($_POST['check_login']))
{
$account = $_POST['account'];
$password = $_POST['password'];
}
else
{
$account=$_COOKIE['account'];
$password=$_COOKIE['password'];
}




$check_user = mysqli_query($conn,"select * from $usertable where account='$account' and password='$password' and active");
if ($result = mysqli_fetch_array($check_user))
{
setcookie("account",$result['account'],time()+3600*24*30);
setcookie("password",$result['password'],time()+3600*24*30);
$firstname = $result['firstname'];
$lastname = $result['lastname'];
$phonenumber = $result['phonenumber'];
$email = $result['email'];
$address = $result['address'];
$vip = $result['vip'];
$adminfunction="";
if ($vip)
{
$pricefield="price2";
}
else
{
$pricefield="price1";
}
if ($account==="admin")
{




if(isset($_POST['modifyhome']))
{
$name = $_POST['name'];
$menuabout = $_POST['menuabout'];
$menushop = $_POST['menushop'];
$menublog = $_POST['menublog'];
$titleshop = $_POST['titleshop'];
$titleblog = $_POST['titleblog'];
$homephone = $_POST['phone'];
$homemail = $_POST['mail'];
$homeaddress = $_POST['address'];
$sql = "update $indextable set name='$name',menuabout='$menuabout',menushop='$menushop',menublog='$menublog',titleshop='$titleshop',
titleblog='$titleblog',phone='$homephone',mail='$homemail',address='$homeaddress'";
mysqli_query($conn,$sql);
$pic="static/picture/logo.jpg";
$file=$_FILES['file0'];
if ((($file["type"] == "image/gif")
|| ($file["type"] == "image/jpeg")
|| ($file["type"] == "image/pjpeg"))
&& ($file["size"] < 50000000))
  {
  if ($file["error"] > 0)
    {
    echo "Return Code: " . $file["error"] . "<br />";
    }
  else
    {

unlink($pic);
move_uploaded_file($file["tmp_name"],$pic);
    }
  }
}










$privilege="admin";
$pricefield="price0";
$adminfunction=
'
<li><a href="index.php?action=modifyhome"><i class="fa fa-angle-double-right" aria-hidden="true"></i>ModifyHome</a></li>
<li><a href="index.php?action=myusers&page=1"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Myusers</a></li>
';
}


$userfunction=
'
<li>
     <a href="#">'.$account.'</a>
     <ul class="sub-menu">
     <li><a href="index.php?action=logout"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Logout</a></li>
     <li><a href="index.php?action=profile"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Profile</a></li>
     <li><a href="index.php?action=changepassword"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Changepassword</a></li>
     '.$adminfunction.'
     </ul>
</li>
';



}
else
{

if (isset($_POST['check_login']))
{
$act="invalid";
}

}


$home=mysqli_query($conn,"select * from $indextable");
$home=mysqli_fetch_array($home);
$name=$home['name'];
$menuabout=$home['menuabout'];
$menushop=$home['menushop'];
$menublog=$home['menublog'];
$titleshop=$home['titleshop'];
$titleblog=$home['titleblog'];
$homephone=$home['phone'];
$homemail=$home['mail'];
$homeaddress=$home['address'];

include('template/header.php');
include('template/procedure.php');



switch(true){
case ($act==="about"):
include('template/about.php');
break;

case ($act==="signup"):
include('template/signup.php');
break;

case ($act==="login"):
include('template/login.php');
break;

case ($act==="profile"):
include('template/profile.php');
break;

case ($act==="modifyhome"):
include('template/modifyhome.php');
break;

case ($act==="changepassword"):
include('template/password.php');
break;

case ($act==="myusers"):
include('template/myusers.php');
break;

case ($act==="invalid"):
include('template/invalid.php');
break;

case ($act==="shop"):
include('template/shop.php');
break;

case ($act==="blog"):
include('template/blog.php');
break;

case ($act==="singleitem"):
include('template/singleitem.php');
break;

case ($act==="singleblog"):
include('template/singleblog.php');
break;

case ($act==="newblog"):
include('template/newblog.php');
break;

case ($act==="newitem"):
include('template/newitem.php');
break;

case ($act==="modifyblog"):
include('template/modifyblog.php');
break;

case ($act==="modifyitem"):
include('template/modifyitem.php');
break;

case ($act==="modifyabout"):
include('template/modifyabout.php');
break;

default:
$fetch = mysqli_query($conn,"select * from $indexslidertable");
include('template/slider.php');

$fetch = mysqli_query($conn,"select * from $itemtable where home group by category,name order by category");
include('template/homeitem.php');

$fetch = mysqli_query($conn,"select * from $blogtable where home group by category,title");
include('template/homeblog.php');



}






include('template/footer.php');







?>