<?php

$get = "select * from $abouttable";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$title=$get['title'];
$slogan=$get['slogan'];
$content=$get['content'];

if ($privilege==="admin")
{
$modify=
'
<a href="index.php?action=modifyabout" class="btn add-cart-btn">Modify</a>

';
}
else
{
$modify='';
}


print <<<EOT


        <!-- Start About Greenforest Section -->
        <section class="bg-about-greenforest">
            <div class="container">
                <div class="row">
                    <div class="about-greenforest">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="about-greenforest-content">
                                    <h2>$title</h2>
                                    <p><span>$slogan</span></p>
                                    <p>$content</p>
                                </div>
                                <!-- .about-greenforest-content -->
                            </div>

                            <div class="col-lg-4">
                                    <img src="static/picture/about.jpg" class="img-responsive">
                                <!-- .about-greenforest-img -->
                            </div>

                            <div class="col-lg-4">
                            $modify
                            </div>




                        </div>
                    </div>
                    <!-- .about-greenforest -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End About Greenforest Section -->

EOT;

?>
