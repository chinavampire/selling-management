<?php
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
                                        <input type="text" class="form-control" name="name" placeholder="Home Title" maxlength="30" required="required" value="$name" />
                                        <input type="text" class="form-control" name="menuabout" placeholder="Menu1" maxlength="30" required="required" value="$menuabout" />
                                        <input type="text" class="form-control" name="menushop" placeholder="Menu2" maxlength="30" required="required" value="$menushop" />
                                        <input type="text" class="form-control" name="menublog" placeholder="Menu3" maxlength="30" required="required" value="$menublog" />
                                        <input type="text" class="form-control" name="titleshop" placeholder="Title1" maxlength="20" required="required" value="$titleshop" />
                                        <input type="text" class="form-control" name="titleblog" placeholder="Title2" maxlength="20" required="required" value="$titleblog" />
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" maxlength="30" required="required" value="$homephone" />
                                        <input type="text" class="form-control" name="mail" placeholder="E-mail" maxlength="50" required="required" value="$homemail" />
                                        <input type="text" class="form-control" name="address" placeholder="Address" maxlength="100" required="required" value="$homeaddress" />



<div class="row" id="img">
<img style="width:135px;height:63px;" id="imgPre" src="static/picture/logo.jpg">
<input type="file" name="file0" id="file0" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id);" />
(135px * 63px recommended)
<hr>
</div>



                           </div>

                                    <button type="submit" name="modifyhome" class="btn btn-default">Confirm</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End New Section -->

EOT;

?>
