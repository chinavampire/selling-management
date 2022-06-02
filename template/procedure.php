<?php



switch(true){
case (isset($_POST['newblog'])):
$category = $_POST['category'];
$title = $_POST['title'];
$date = $_POST['date'];
$location = $_POST['location'];
$text = $_POST['text'];
if (isset($_POST['home']))
{$home=1;}
else
{$home=0;}
$sql = "INSERT INTO $blogtable(category,title,date,location,text,home)VALUES('$category','$title','$date','$location','$text','$home')";
mysqli_query($conn,$sql);

$file=$_FILES['file'];
$num = count($file["name"]);
for($i=0;$i<$num-1;++$i){

$pic="pic/blog/".mysqli_insert_id($conn)."-".$i.".jpg";
if ((($file["type"][$i] == "image/gif")
|| ($file["type"][$i] == "image/jpeg")
|| ($file["type"][$i] == "image/pjpeg"))
&& ($file["size"][$i] < 50000000))
  {
  if ($file["error"][$i] > 0)
    {
    echo "Return Code: " . $file["error"][$i] . "<br />";
    }
  else
    {
    if (file_exists($pic))
      {
      echo $pic . " already exists. ";
      }
    else
      {
      move_uploaded_file($file["tmp_name"][$i],$pic);
      }
    }
  }
else
  {
exit('error：invalid size...<a href="javascript:history.back(-1);">go back</a>');
  }
}
break;

case (isset($_POST['newitem'])):
$category = $_POST['category'];
$name = $_POST['name'];
$spec = $_POST['spec'];
$price0 = $_POST['price0'];
$price1 = $_POST['price1'];
$price2 = $_POST['price2'];
if (intval($price0)===0)
{$price0=0;}
if (intval($price1)===0)
{$price1=0;}
if (intval($price2)===0)
{$price2=0;}



$description = $_POST['description'];
if (isset($_POST['home']))
{$home=1;}
else
{$home=0;}
$sql = "INSERT INTO $itemtable(category,name,spec,price0,price1,price2,description,home)VALUES
('$category','$name','$spec','$price0','$price1','$price2','$description','$home')";
mysqli_query($conn,$sql);

$file=$_FILES['file'];
$num = count($file["name"]);
for($i=0;$i<$num-1;++$i){

$pic="pic/item/".mysqli_insert_id($conn)."-".$i.".jpg";
if ((($file["type"][$i] == "image/gif")
|| ($file["type"][$i] == "image/jpeg")
|| ($file["type"][$i] == "image/pjpeg"))
&& ($file["size"][$i] < 50000000))
  {
  if ($file["error"][$i] > 0)
    {
    echo "Return Code: " . $file["error"][$i] . "<br />";
    }
  else
    {
    if (file_exists($pic))
      {
      echo $pic . " already exists. ";
      }
    else
      {
      move_uploaded_file($file["tmp_name"][$i],$pic);
      }
    }
  }
else
  {
exit('error：invalid size...<a href="javascript:history.back(-1);">go back</a>');
  }
}
break;

case (isset($_POST['newuser'])):
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$address = $_POST['address'];
$account = $_POST['account'];
$password = $_POST['password'];
$sql = "INSERT INTO $usertable(firstname,lastname,phonenumber,email,address,account,password,regdate)VALUES
('$firstname','$lastname','$phonenumber','$email','$address','$account','$password',NOW())";
mysqli_query($conn,$sql);
break;

case (isset($_POST['changepassword'])):
$newpass = $_POST['newpass'];
$account = $_POST['account'];
$sql = "update $usertable set password='$newpass' where account='$account'";
mysqli_query($conn,$sql);
break;

case (isset($_POST['profile'])):
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$address = $_POST['address'];
$sql = "update $usertable set firstname='$firstname',lastname='$lastname',phonenumber='$phonenumber',email='$email',address='$address' where account='$account'";
mysqli_query($conn,$sql);
break;

case (isset($_POST['modifyabout'])):
$title = $_POST['title'];
$slogan = $_POST['slogan'];
$content = $_POST['content'];
$sql = "update $abouttable set title='$title',slogan='$slogan',content='$content'";
mysqli_query($conn,$sql);
$pic="static/picture/about.jpg";
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
break;

case (isset($_POST['modifyblog'])):
$index=$_POST['modifyindex'];
$date = $_POST['date'];
$location = $_POST['location'];
$text = $_POST['text'];
if (isset($_POST['home']))
{$home=1;}
else
{$home=0;}
$sql = "update $blogtable set date='$date',location='$location',text='$text',home='$home' where `index`='$index'";
mysqli_query($conn,$sql);


$file=$_FILES['file'];
$delete=array_unique($_POST['del']);
asort($delete);
$delete=array_values($delete);
var_dump($delete);
echo "<br>";
$num = count($delete);
for($i=0;$i<$num;++$i){
$pic="pic/blog/".$index."-".$delete[$i].".jpg";

if (file_exists($pic))
{
unlink($pic);
}
}

$folderPath = "pic/blog/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$countFile = count($totalFiles);
}

$newpicindex=substr($totalFiles[$countFile-1],strlen($index)+10,strlen($totalFiles[$countFile-1])-14-strlen($index))+1;

$arr=array_filter($file["name"]);
$arr=array_values($arr);
$type=array_filter($file["type"]);
$type=array_values($type);
$tmp_name=array_filter($file["tmp_name"]);
$tmp_name=array_values($tmp_name);
$size=array_filter($file["size"]);
$size=array_values($size);
$num = count($arr);
$ii=0;

for($i=0;$i<$num;++$i){
if ($delete[$i])
{
$picindex=$delete[$i];
}
else
{
$picindex=$newpicindex+$ii;
$ii++;
}
$pic="pic/blog/".$index."-".$picindex.".jpg";

if ((($type[$i] == "image/gif")
|| ($type[$i] == "image/jpeg")
|| ($type[$i] == "image/pjpeg"))
&& ($size[$i] < 50000000))
  {
    if (file_exists($pic))
      {
unlink($pic);
      }
      move_uploaded_file($tmp_name[$i],$pic);
  }
else
  {
exit('error：invalid size...<a href="javascript:history.back(-1);">go back</a>');
  }

}
break;

case (isset($_POST['modifyitem'])):
$index=$_POST['modifyindex'];
$price0 = $_POST['price0'];
$price1 = $_POST['price1'];
$price2 = $_POST['price2'];

if (isset($_POST['home']))
{$home=1;}
else
{$home=0;}
$sql = "update $itemtable set price0='$price0',price1='$price1',price2='$price2' where `index`='$index'";
mysqli_query($conn,$sql);


$file=$_FILES['file'];
$delete=array_unique($_POST['del']);
asort($delete);
$delete=array_values($delete);
var_dump($delete);
echo "<br>";
$num = count($delete);
for($i=0;$i<$num;++$i){
$pic="pic/item/".$index."-".$delete[$i].".jpg";

if (file_exists($pic))
{
unlink($pic);
}
}

$folderPath = "pic/item/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$countFile = count($totalFiles);
}

$newpicindex=substr($totalFiles[$countFile-1],strlen($index)+10,strlen($totalFiles[$countFile-1])-14-strlen($index))+1;

$arr=array_filter($file["name"]);
$arr=array_values($arr);
$type=array_filter($file["type"]);
$type=array_values($type);
$tmp_name=array_filter($file["tmp_name"]);
$tmp_name=array_values($tmp_name);
$size=array_filter($file["size"]);
$size=array_values($size);
$num = count($arr);
$ii=0;

for($i=0;$i<$num;++$i){
if ($delete[$i])
{
$picindex=$delete[$i];
}
else
{
$picindex=$newpicindex+$ii;
$ii++;
}
$pic="pic/item/".$index."-".$picindex.".jpg";

if ((($type[$i] == "image/gif")
|| ($type[$i] == "image/jpeg")
|| ($type[$i] == "image/pjpeg"))
&& ($size[$i] < 50000000))
  {
    if (file_exists($pic))
      {
unlink($pic);
      }
      move_uploaded_file($tmp_name[$i],$pic);
  }
else
  {
exit('error：invalid size...<a href="javascript:history.back(-1);">go back</a>');
  }

}
break;


default:
$default = 1;
}









?>