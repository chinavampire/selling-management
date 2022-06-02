<?php
$curdate=date("Y-m-d");





print <<<EOT


        <!-- Start New Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                            <div class="col-lg-12">
                                <h3 class="contact-title">New</h3>
                                <form action="index.php?action=shop&page=1" method="POST" id="checkform" class="contact-form" enctype="multipart/form-data" onSubmit="return checkform(this);">


<script type="text/javascript">  
function preImg(sourceId, i) {  
var targetId="imgPre"+i;
var hiddenindex=parseInt(document.getElementById('imgindex').value);
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

if (document.getElementById('deletepic'+i).style.display==="none")
{
document.getElementById('deletepic'+i).style.display="block";
document.getElementById('file'+i).style.display="none";
document.getElementById('newormodify'+i).innerHTML=
'<i class="fa fa-pencil" aria-hidden="true" onclick="file'+i+'.click()"></i>';
hiddenindex++;
var addiv="img"+hiddenindex;
document.getElementById('imgindex').value=hiddenindex;





var html='<img id="imgPre'+hiddenindex+'" src="">'+
'<div style="width:50%;text-align:left;">'+
'<div id="newormodify'+hiddenindex+'"></div>'+
'<input type="file" name="file[]" id="file'+hiddenindex+'" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id,\''+hiddenindex+'\');" />'+
'</div>'+
'<div style="width:50%;text-align:right;display:none;" id="deletepic'+hiddenindex+'">'+
'<i class="fa fa-trash" aria-hidden="true" onclick="deletepic(\''+hiddenindex+'\')"></i>'+
'</div><hr>'				
//alert(html);
    var top1 = document.getElementById("uploadform");
    var div = document.createElement("div");
    div.innerHTML=html;
    div.id=addiv;
    div.className="row";
    top1.appendChild(div);
}





}  
</script>  


<script type="text/javascript">  
function deletepic(v) {  

$("#img"+v).remove();

}  



</script>  





<script type="text/javascript">
    function checkform(thisfrm) {

var ret=0;

            $.ajax({
                type: "POST",
                dataType: "html",
                url: "template/ajax/chkitem.php",
                async:false,
                data: $("#checkform").serialize(),
                success: function (result) {
if (result=="exist") {
alert ("Already exists ! Please change category or name.");
ret++;
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

if (ret>0)
{
    thisfrm.getfocus.focus();
    return (false);
}



}
</script>













                            <div class="paymeny-information" id="uploadform">
                                        <input type="hidden" name="imgindex" id="imgindex" value="0" />
                                        <input type="text" class="form-control" name="category" placeholder="Category" maxlength="20" required="required" />
                                        <input type="text" class="form-control" name="name" placeholder="Name" maxlength="20" required="required" />
                                        <input type="text" class="form-control" name="spec" placeholder="Specification" maxlength="20" id="getfocus" />
                                        <input type="number" class="form-control" name="price0" placeholder="Default Price" min="0" max="9999999.99" />
                                        <input type="number" class="form-control" name="price1" placeholder="Registered Price" min="0" max="9999999.99" />
                                        <input type="number" class="form-control" name="price2" placeholder="Vip Price:" min="0" max="9999999.99" />
                                        <textarea class="form-control text-area" rows="3" name="description" placeholder="Description" maxlength="600"></textarea>
                                <div class="row" id="img0">


                                        <img id="imgPre0" src="">
                                  <div style="width:50%;text-align:left;">
                                    <div id="newormodify0"></div>
                                  <input type="file" name="file[]" id="file0" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id,'0');" />
                                  </div>
                                  <div style="width:50%;text-align:right;display:none;" id="deletepic0">
                                  <i class="fa fa-trash" aria-hidden="true" onclick="deletepic('0')"></i>
                                  </div>
<hr>
                                </div>
                           </div>

<br><br>
                                        <p>Show on homepage&nbsp&nbsp<input name="home" type="checkbox" value=1 /></p><br>
                                    <button type="submit" name="newitem" class="btn btn-default">Confirm</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End New Section -->

EOT;

?>
