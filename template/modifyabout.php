<?php

$get = "select * from $abouttable";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$title=$get['title'];
$slogan=$get['slogan'];
$content=$get['content'];

print <<<EOT


<script type="text/javascript">  
function preImg(sourceId) {  
var targetId="imgPre";
    if (typeof FileReader === 'undefined') {  
        alert('Your browser does not support FileReader...');  
        return;  
    }  
    var reader = new FileReader();  
    reader.onload = function(e) {  
        var img = document.getElementById(targetId);  
        img.src = this.result;  
    }  
    reader.readAsDataURL(document.getElementById(sourceId).files[0]);  

}  
</script>  



        <!-- Start New Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                            <div class="col-lg-12">
                                <h3 class="contact-title">Modify Home</h3>
                                <form action="index.php" method="POST" class="contact-form" enctype="multipart/form-data">


                            <div class="paymeny-information" id="uploadform">
                                        <input type="text" class="form-control" name="title" placeholder="About Title" maxlength="20" required="required" value="$title" />
                                        <input type="text" class="form-control" name="slogan" placeholder="About Slogan" maxlength="100" required="required" value="$slogan" />
                                        <textarea class="form-control text-area" rows="5" name="content" maxlength="1000">$content</textarea>



<div class="row" id="img">
<img id="imgPre" src="static/picture/about.jpg">
<input type="file" name="file0" id="file0" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id);" />
<hr>
</div>



                           </div>

                                    <button type="submit" name="modifyabout" class="btn btn-default">Confirm</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End New Section -->

EOT;

?>
