<?php
$index=$_GET['index'];
$get = "select * from $itemtable where `index`='$index'";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$category=$get['category'];
$name=$get['name'];
$price0=$get['price0'];
$price1=$get['price1'];
$price2=$get['price2'];
$home=$get['home'];
if ($home)
{
$homechecked=' checked="checked"';
}


$countFile = 0;
$imgindex=0;
$folderPath = "pic/item/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$countFile = count($totalFiles);
}

$newpicindex=substr($totalFiles[$countFile-1],strlen($index)+10,strlen($totalFiles[$countFile-1])-14-strlen($index))+1;
$showpic='';
$newpic=
'
                                <div class="row" id="img'.$newpicindex.'">
                                        <img id="imgPre'.$newpicindex.'" src="">
                                  <div style="width:50%;text-align:left;">
                                    <div id="newormodify'.$newpicindex.'"></div>
                                  <input type="file" name="file[]" id="file'.$newpicindex.'" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id,\''.$newpicindex.'\');" />
                                  </div>
                                  <div style="width:50%;text-align:right;display:none;" id="deletepic'.$newpicindex.'">
                                  <i class="fa fa-trash" aria-hidden="true" onclick="deletepic(\''.$newpicindex.'\')"></i>
                                  </div>
<hr>
                                </div>

';


for($i=0;$i<$countFile;++$i)
{
$imgindex=substr($totalFiles[$i],strlen($index)+10,strlen($totalFiles[$i])-14-strlen($index));

$showpic.=
'
<div class="row" id="img'.$imgindex.'">
<img id="imgPre'.$imgindex.'" src="'.$totalFiles[$i].'">
<div style="width:50%;text-align:left;">
<div id="newormodify'.$i.'"><i class="fa fa-pencil" aria-hidden="true" onclick="file'.$imgindex.'.click();"></i></div>
<input type="file" style="display:none;" name="file[]" id="file'.$imgindex.'" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id,\''.$imgindex.'\');" />
</div>
<div style="width:50%;text-align:right;display:block;" id="deletepic'.$imgindex.'">
<i class="fa fa-trash" aria-hidden="true" onclick="deletepic(\''.$imgindex.'\')"></i>
</div>
<hr>
</div>



';
}




print <<<EOT


        <!-- Start New Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                            <div class="col-lg-12">
                                <h3 class="contact-title">Modify</h3>
                                <form action="index.php?action=shop&page=1" method="POST" class="contact-form" enctype="multipart/form-data">


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
'</div><hr>';				
//alert(html);
    var top1 = document.getElementById("uploadform");
    var div = document.createElement("div");
    div.innerHTML=html;
    div.id=addiv;
    div.className="row";
    top1.appendChild(div);
}
else
{
var html='<input type="hidden" name="del[]" value="'+i+'" />';
    var top1 = document.getElementById("uploadform");
    var div = document.createElement("div");
    div.innerHTML=html;
    top1.appendChild(div);

}




}  
</script>  


<script type="text/javascript">  
function deletepic(v) {  


var html='<input type="hidden" name="del[]" value="'+v+'" />';
    var top1 = document.getElementById("uploadform");
    var div = document.createElement("div");
    div.innerHTML=html;
    top1.appendChild(div);




$("#img"+v).remove();

}  



</script>  






                            <div class="paymeny-information" id="uploadform">
                                        <input type="hidden" name="imgindex" id="imgindex" value=$newpicindex />
                                        <input type="hidden" name="modifyindex" value=$index />
                                        <div style="text-align:left;"><label style="display:inline-block; width:200px;">Default Price:</label><input type="number" name="price0" min="0" max="9999999.99" value=$price0 /></div><br>
                                        <div style="text-align:left;"><label style="display:inline-block; width:200px;">Registered Price:</label><input type="number" name="price1" min="0" max="9999999.99" value=$price1 /></div><br>
                                        <div style="text-align:left;"><label style="display:inline-block; width:200px;">Vip Price:</label><input type="number" name="price2" min="0" max="9999999.99" value=$price2 /></div><br>

                                        $showpic
                                        $newpic
                           </div>

<br><br>
                                        <p>Show on homepage&nbsp&nbsp<input name="home" type="checkbox" value=1 $homechecked /></p><br>
                                    <button type="submit" name="modifyitem" class="btn btn-default">Confirm</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End New Section -->

EOT;

?>
