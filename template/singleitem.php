<?php
$index=$_GET['index'];


if ($privilege==="admin")
{
$modify=
'
<a href="index.php?action=modifyitem&index='.$index.'" class="btn add-cart-btn">Modify</a>
<a href="#" class="btn add-cart-btn" onclick="delitem(\''.$index.'\')">Delete</a>

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
function delitem(v) {  


            $.ajax({
                type: "POST",
                dataType: "html",
                url: "template/ajax/delitem.php?index="+v,
                async:false,
                success: function (result) {
if (parseInt(result)>0) {
window.location.href='index.php?action=singleitem&index='+result;
}
else
{
window.location.href='index.php?action=shop&page=1';
}

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

<script type="text/javascript">
    function renew() {
var v=$("#selectspec option:selected");
var v=v.val();

window.location.href='index.php?action=singleitem&index='+v;


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
$optionindex=$fetched['index'];

$selected="";
if ($optionindex===$index)
{
$selected='selected="selected"';
}

print <<<EOT
<option value=$optionindex $selected>$spec</option>
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
