<?php
 include('../../conn.php');
$usertable="0enuser";
$itemtable="0enitem";
$index = $_GET['index'];
$pricefield="price0";
$account=$_COOKIE['account'];
$password=$_COOKIE['password'];
$check_user = mysqli_query($conn,"select * from $usertable where account='$account' and password='$password' and active");
if ($result = mysqli_fetch_array($check_user))
{
$vip = $result['vip'];
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
$pricefield="price0";
}
}


$picslider='';
$piccarousel='';
$countFile = 0;
$folderPath = "../../pic/item/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$countFile = count($totalFiles);
}

$picindex = array();

for($i=0;$i<$countFile;++$i)
{
$newpicindex=substr($totalFiles[$i],strlen($index)+16,strlen($totalFiles[$i])-20-strlen($index));
$pic=substr($totalFiles[$i],6);
//$picindex=array_merge($picindex,array('i'.$i=>$newpicindex));
//array_push($picindex,$newpicindex);
array_push($picindex,$pic);
$picslider.=
'
                                                    <li>
                                                        aaa<a href="'.$pic.'"><img src="'.$pic.'"></a>
                                                    </li>
';

$piccarousel.=
'
                                                    <li>
                                                        bbb<img src="'.$pic.'">
                                                    </li>
';

}


$check = "select * from $itemtable where `index`='$index'";
$check = mysqli_query($conn,$check);
while($checked = mysqli_fetch_array($check)){
$price=$checked[$pricefield];
$description=$checked['description'];
}




$picslider='<ul class="slides">'.$picslider.'</ul>';
$piccarousel='<ul class="slides">'.$piccarousel.'</ul>';









$echo=array("picindex" => $picindex,"slider" => $picslider,"carousel" => $piccarousel,"price" => $price,"description" => $description);
echo json_encode($echo);

?>
