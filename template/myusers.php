<?php

if ($privilege==="admin")
{

if (isset($_GET['del']))
{
$account=$_GET['del'];
mysqli_query($conn,"delete from $usertable where account='$account'");
}








$amount=10;
$page=$_GET['page'];
$showstarting=$amount*($page-1)+1;
$showending=$amount*$page;
$category="";
$search="";
$fetchheader="select count(1) as totalrec";
$fetch=" from $usertable where 1=1 and account<>'admin'";


if (isset($_POST['search']) and $_POST['search']<>'')
{
$search=$_POST['search'];
$fetch.=" and (binary account LIKE '%$search%' or binary phonenumber LIKE '%$search%' or binary firstname LIKE '%$search%' or binary lastname LIKE '%$search%') ";
}
if (isset($_GET['search']) and $_GET['search']<>'')
{
$search=$_GET['search'];
$fetch.=" and (binary account LIKE '%$search%' or binary phonenumber LIKE '%$search%' or binary firstname LIKE '%$search%' or binary lastname LIKE '%$search%') ";
}

$fetch.="  order by active";
$fetchtotalrec=$fetchheader.$fetch;


$fetchtotalrec=mysqli_query($conn,$fetchtotalrec);
$fetched = mysqli_fetch_array($fetchtotalrec);
$totalrec = $fetched['totalrec'];
if ($totalrec<$showending)
{
$showending=$totalrec;
}

}


print <<<EOT


        <!-- Start User Section -->
        <section class="bg-shop-section">
            <div class="container">
                <div class="row">
                    <div class="shop-option">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="list">
                                            <div class="shop-collection">
                                                <div class="row">


                                    <div class="widget">
                                        <div class="shop-widget-content">
                                            <form action="index.php?action=myusers&page=1" method="POST" class="sidebar-form" name="searchform">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="searchId" name="search" placeholder="Search...">
                                                    <i class="fa fa-search" aria-hidden="true" onclick="searchform.submit();"></i>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- .shop-widget-content -->
                                    </div>
                                    <!-- .widget -->
                           
                             <div class="col-lg-12 col-sm-6 col-12">
                                <div class="shop-results-box">
                                    <div class="results-number">
                                        <p>Showing <span>$showstarting - $showending</span> of $totalrec Results</p>
                                    </div>
                                    <!-- .results-number -->
                                </div>
                            </div>

<br><br><br>




<script type="text/javascript">
    function user(v1,v2) {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "template/ajax/modifyuser.php?modify="+v1+"&account="+v2,
                async:false,
                success: function (result) {
switch(true)
{
case result==="reset":
alert("Password has been reset to 123456 .");
break;
case result==="activate":
alert("Account has been activated.");
document.getElementById('modify'+v2).setAttribute("class","fa fa-user");
document.getElementById('modify'+v2).setAttribute("onclick","user('vip','"+v2+"')");
break;
case result==="vip":
alert("Account has been upgraded to vip.");
document.getElementById('modify'+v2).setAttribute("class","fa fa-diamond");
document.getElementById('modify'+v2).setAttribute("onclick","user('new','"+v2+"')");
break;
case result==="new":
alert("Account has been deactivated.");
document.getElementById('modify'+v2).setAttribute("class","fa fa-tag");
document.getElementById('modify'+v2).setAttribute("onclick","user('activate','"+v2+"')");
break;

default:

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




    function deluser(v) {
var res=confirm("Are you sure to delete "+v+" permanently ?");
if (res)
{
window.location.href='index.php?action=myusers&page=1&del='+v;
}
}





</script>








EOT;







$fetchstart=$showstarting-1;

$fetchheader="select * ";
$fetch.=" limit $fetchstart ,$amount";
$fetch=$fetchheader.$fetch;
$fetch = mysqli_query($conn,$fetch);
while($fetched = mysqli_fetch_array($fetch)){
$account=$fetched['account'];
$fullname=$fetched['firstname']." ".$fetched['lastname'];
$phonenumber=$fetched['phonenumber'];
$email=$fetched['email'];
$address=$fetched['address'];
$active=$fetched['active'];
$vip=$fetched['vip'];






switch(true){
case ($vip==='1'):
$fa="diamond";
$modifyparameter="new";
break;

case ($vip==='0' and $active==='1'):
$fa="user";
$modifyparameter="vip";
break;

case ($active==='0'):
$fa="tag";
$modifyparameter="activate";
break;

default:



}














print <<<EOT

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="our-services-box">
                                    <div class="our-services-items">

                                        <div class="our-services-content">
                                            <h4>$account</h4>
                                            <p style="text-align:left;">Name:<br>$fullname</p>
                                            <p style="text-align:left;">Phone Number:<br>$phonenumber</p>
                                            <p style="text-align:left;">Email:<br>$email</p>
                                            <p style="text-align:left;">Address:<br>$address</p>


                                    <div class="row">

                                        <div style="text-align:left;width:33%;">
                                                <i aria-hidden="true" id="modify$account" class="fa fa-$fa" onclick="user('$modifyparameter','$account')"></i>
                                        </div>
                                        <div style="text-align:center;width:34%;">
                                                <i class="fa fa-power-off" aria-hidden="true" onclick="user('reset','$account')"></i>
                                        </div>
                                        <div style="text-align:right;width:33%;">
                                                <i class="fa fa-trash" aria-hidden="true" onclick="deluser('$account')"></i>
                                        </div>



                                    </div>
                                    <!-- .row -->


                                        </div>
                                        <!-- .our-services-content -->
                                    </div>
                                    <!-- .our-services-items -->
                                </div>
                                <!-- .our-services-box -->
                            </div>

EOT;

}


$leftpage=$page-1;
$rightpage=$page+1;

$pagegoleft=
'
                                                        <li>
                                                            <a href="index.php?action=user&search='.$search.'&page='.$leftpage.'" aria-label="Previous">
                                                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                                            </a>
                                                        </li>

';

$pagegoright=
'
                                                        <li>
                                                            <a href="index.php?action=user&search='.$search.'&page='.$rightpage.'" aria-label="Next">
                                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                            </a>
                                                        </li>

';

if ($leftpage<1)
{
$pagegoleft='';
}

if ($amount*$page>=$totalrec)
{
$pagegoright='';
}

print <<<EOT

                                            <!-- .shop-collection-->
                                            <div class="pagination-option">
                                                <nav aria-label="Page navigation">
                                                    <ul class="pagination">
                                                        $pagegoleft
                                                        <li style="color:green;font-size:22px;font-weight:bold;">Page-$page</li>
                                                        $pagegoright
                                                    </ul>
                                                </nav>
                                            </div>
                                            <!-- .pagination_option -->






















                                                </div>
                                                <!-- .row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .col-md-12 -->




                        </div>
                        <!-- .row -->
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End User Section -->









EOT;



?>
