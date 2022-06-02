<?php
print <<<EOT


        <!-- Start Home Product Section -->
        <section class="bg-recent-project">
            <div class="container">
                <div class="row">
                    <div class="recent-project">
                        <div class="section-header">
                            <h2>$titleshop</h2>
                        </div>
                        <!-- .section-header -->
                        <div class="portfolio-items">

EOT;

while($fetched = mysqli_fetch_array($fetch)){
$index=$fetched['index'];
$name=$fetched['name'];
$price0=$fetched[$pricefield];
$pic="";
$folderPath = "pic/item/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$pic = $totalFiles[0];
}

print <<<EOT


                            <div class="item cat-1" data-category="transition">
                                <div class="item-inner">
                                    <div class="portfolio-img">
                                        <a href="index.php?action=singleitem&index=$index"><img src=$pic ></a>
                                    </div>
                                    <!-- /.portfolio-img -->
                                    <div class="recent-project-content">
                                        <h4>$name</h4><br>
                                            <div class="price-left">
                                                <h5>Price:<span>$price0</span></h5>
                                            </div><br>
                                    </div>
                                </div>
                                <!-- .item-inner -->
                            </div>
                            <!-- .items -->

EOT;

}


print <<<EOT


                        </div>
                        <!-- .isotope-items -->
                    </div>
                    <!-- .home-product -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Home Product Section -->

EOT;
?>
