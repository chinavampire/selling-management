<?php
print <<<EOT


        <!-- Start Slider Section -->
        <section class="bg-slider-option">
            <div class="slider-option slider-two">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

EOT;



$slideractive='active';

while($fetched = mysqli_fetch_array($fetch)){


$slidertext=$fetched['text'];
$sliderpic='"pic/slider/'.$fetched['index'].'.jpg"';

print <<<EOT
                         <div class="carousel-item $slideractive">
                            <div class="slider-item">
                                <img src=$sliderpic>
                                <div class="slider-content-area">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="slider-content">
                                                    <h2>$slidertext</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
EOT;

$slideractive='';


}













print <<<EOT
                    </div>
                    <button class="left carousel-control carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="right carousel-control carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <!-- End Slider Section -->

EOT;
?>
