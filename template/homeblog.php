<?php
print <<<EOT

        <!-- Start Blog Section -->
        <section class="bg-upcoming-events">
            <div class="container">
                <div class="row">
                    <div class="upcoming-events">
                        <div class="section-header">
                            <h2>$titleblog</h2>
                        </div>
                        <!-- .section-header -->
                        <div class="row">

EOT;

while($fetched = mysqli_fetch_array($fetch)){
$index=$fetched['index'];
$title=$fetched['title'];
$date=$fetched['date'];
$location=$fetched['location'];
$text=$fetched['text'];

$pic="";
$folderPath = "pic/blog/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$pic = $totalFiles[0];
}




print <<<EOT


                            <div class="col-lg-6">
                                <div class="event-items">
                                    <div class="event-img">
                                        <a href="index.php?action=singleblog&index=$index"><img src=$pic class="img-responsive"></a>
                                    </div>
                                    <!-- .event-img -->
                                    <div class="events-content">
                                        <h3><a href="#">$title</a></h3>
                                        <ul class="meta-post">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i> $date</li>
                                            <li><i class="fa fa-map-marker"></i> $location</li>
                                        </ul>
                                        <p style="width:100%;height:100px;">$text</p>
                                    </div>
                                    <!-- .events-content -->
                                </div>
                                <!-- .events-items -->
                            </div>

EOT;

}


print <<<EOT


                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .upcoming-events -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Blog Section -->

EOT;
?>
