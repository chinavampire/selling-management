<?php
$index=$_GET['index'];


if ($privilege==="admin")
{
$modify=
'
<a href="index.php?action=modifyitem?index='.$index.'" class="btn add-cart-btn">Modify</a>
';
}
else
{
$modify='';
}


$fetch="select * from $itemtable where `index`=$index ";
$fetch=mysqli_query($conn,$fetch);
$fetched = mysqli_fetch_array($fetch);
$category=$fetched['category'];
$name=$fetched['name'];
$price=$fetched[$pricefield];
$description=$fetched['description'];
$picslider='';
$piccarousel='';
$countFile = 0;
$folderPath = "pic/item/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$countFile = count($totalFiles);
}

for($i=0;$i<$countFile;++$i)
{
$pic=$totalFiles[$i];
$picslider.=
'
                                                    <li>
                                                        <a href='.$pic.'><img src='.$pic.'></a>
                                                    </li>
';

$piccarousel.=
'
                                                    <li>
                                                        <img src='.$pic.'>
                                                    </li>
';

}

print <<<EOT



<script type="text/javascript">
var slider='';
var carousel='';
    function renew() {
var v=$("#selectspec option:selected");
var v=v.val();
alert(v);



            $.ajax({
                type: "POST",
                dataType: "html",
                url: "template/ajax/chkspec.php?index="+v,
                async:false,
                success: function (result) {
alert (result);
var obj = JSON.parse(result);
var picindex = obj.picindex;

alert (picindex);



//document.getElementById('showslider').innerHTML="";
//document.getElementById('showcarousel').innerHTML="";
var slider="";
var carousel="";







var amount = 0, key;
for (key in picindex) {
if (picindex.hasOwnProperty(key)) 
slider+="<li><a href='"+picindex[amount]+"'><img src='"+picindex[amount]+"'></a></li>";
carousel+="<li><img src='"+picindex[amount]+"'></li>";
amount++;
}

//slider='<div id="slider" class="flexslider"><ul class="slides">'+slider+'</ul></div>';
//carousel='<div id="carousel" class="flexslider"><ul class="slides">'+carousel+'</ul></div>';
insertpic=slider+carousel;



document.getElementById('insertpic').innerHTML="";

    var top1 = document.getElementById("insertpic");
    var div1 = document.createElement("div");
alert(insertpic)
    div1.innerHTML=insertpic;
    top1.appendChild(div1);








                    console.log(result);//打印服务端返回的数据(调试用)
                    if (result.resultCode == 200) {
                        alert("SUCCESS");
                    }
                    ;
                },
                error : function() {
                    alert("异常！");
                }
            });






}
</script>








        <!-- Start Single Shop Project Section -->
        <section class="bg-shop-section">
            <div class="container">
                <div class="row">
                    <div class="shop-option">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="single-product-slider">
                                        <div id="insertpic">
                                            <div id="slider" class="flexslider">
                                                <ul class="slides" id="showslider">
                                                $picslider
                                                </ul>
                                            </div>
                                            <div id="carousel" class="flexslider">
                                                <ul class="slides" id="showcarousel">
                                                $piccarousel
                                                </ul>
                                            </div>

                                        </div>
                                        </div>
                                        <!-- .single-product -->

                                    </div>
                                    <!-- .col-md-5 -->
                                    <div class="col-md-7">
                                        <div class="about-product-datails">
                                            <h3>$name</h3>
                                            <h4 id="showprice">$price</h4>
                                            <p id="showdescription">$description</p>

                                            
                                            <div class="select-option" id="selectspec" onchange="renew();">
                                                <div class="country-select">
                                                   SPEC:<select>

EOT;


$fetch="select * from $itemtable where `category`='$category' and `name`='$name'";
$fetch=mysqli_query($conn,$fetch);
while($fetched = mysqli_fetch_array($fetch)){
$spec=$fetched['spec'];
$index=$fetched['index'];

print <<<EOT
<option value=$index>$spec</option>
EOT;


}











print <<<EOT


												</select>
                                                    <span class="select-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                </div>
                                                <!-- .select-box -->
                                            </div>
                                            <!-- .select-option -->

                                            $modify



                                        </div>
                                        <!-- .about-product-datails -->
                                    </div>
                                    <!-- .col-md-7 -->
                                </div>
                                <!-- .row -->



                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .shop-option -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Shop Project Section -->





EOT;



?>
