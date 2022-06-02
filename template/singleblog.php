<?php
$index=$_GET['index'];

print <<<EOT


        <section class="bg-blog-section">
            <div class="container">
                <div class="row">
                    <div class="blog-section blog-page">
                        <div class="row">

EOT;


$fetch="select * from $blogtable where `index`=$index ";
$fetch=mysqli_query($conn,$fetch);
$fetched = mysqli_fetch_array($fetch);

$countFile = 0;
$folderPath = "pic/blog/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$countFile = count($totalFiles);
}

for($i=0;$i<$countFile;++$i)
{
$pic=$totalFiles[$i];


print <<<EOT
                            <div class="col-lg-4 col-sm-6 col-12">
                                        <img src=$pic alt="blog-img-1" class="img-responsive">
                            </div>
                            <!-- .col-md-4 -->
EOT;


}

print <<<EOT

                        </div>
                        <!-- .row -->

                    </div>
                    <!-- .blog-section -->
                </div>
                <!-- .container -->
            </div>
            <!-- .bg-blog-section -->
        </section>
        <!-- End Blog Section -->

EOT;

?>
