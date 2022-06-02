<?php


if ($privilege==="admin")
{

print <<<EOT
<div style="text-align:center;">

                                    <form action="index.php?action=newitem" method="post">
                                        <button type="submit" class="btn btn-default">Create</button>
                                    </form>

</div>
EOT;

}




print <<<EOT






        <!-- Start Shop Project Section -->
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





                    <div class="recent-project">
                        <div id="filters" class="button-group ">




EOT;


$amount=3;
$page=$_GET['page'];
$showstarting=$amount*($page-1)+1;
$showending=$amount*$page;
$category="";
$search="";
$fetchheader="select count(1) ";
$fetch=" from $itemtable where 1=1";


if (isset($_GET['category']) and $_GET['category']<>'')
{
$category=$_GET['category'];
$fetch.=" and category='".$category."'";
}



if (isset($_POST['search']) and $_POST['search']<>'')
{
$search=$_POST['search'];
$fetch.=" and (binary name LIKE '%$search%' or binary spec LIKE '%$search%') ";
}
if (isset($_GET['search']) and $_GET['search']<>'')
{
$search=$_GET['search'];
$fetch.=" and (binary name LIKE '%$search%' or binary spec LIKE '%$search%') ";
}


$fetch.=" group by category,name order by category";



$fetchtotalrec=$fetchheader.$fetch;

$fetchtotalrec="select count(1) as totalrec from (".$fetchtotalrec.") x";


$fetchtotalrec=mysqli_query($conn,$fetchtotalrec);
$fetched = mysqli_fetch_array($fetchtotalrec);
$totalrec = $fetched['totalrec'];
if ($totalrec<$showending)
{
$showending=$totalrec;
}

$fetchcategory = mysqli_query($conn,"select * from $itemtable group by category");
while($fetched = mysqli_fetch_array($fetchcategory)){
$fetchedcategory=$fetched['category'];

print <<<EOT


                            <a href="index.php?action=shop&page=1&category=$fetchedcategory"><button class="button is-checked">$fetchedcategory</button></a>

EOT;

}








print <<<EOT





                        </div>
                    </div>








                                    <div class="widget">
                                        <div class="shop-widget-content">
                                            <form action="index.php?action=shop&page=1" method="POST" class="sidebar-form" name="searchform">
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





EOT;








$fetchstart=$showstarting-1;

$fetchheader="select * ";
$fetch.=" limit $fetchstart ,$amount";
$fetch=$fetchheader.$fetch;
$fetch = mysqli_query($conn,$fetch);
while($fetched = mysqli_fetch_array($fetch)){
$name=$fetched['name'];
$price=$fetched[$pricefield];
$index=$fetched['index'];






$pic="";
$folderPath = "pic/item/".$index."-";
$totalFiles = glob($folderPath . "*");
if ($totalFiles){
$pic = $totalFiles[0];
}


if ($privilege==="admin")
{
$modify=
'
<a href="index.php?action=singleitem&index='.$index.'"><i class="fa fa-pencil" aria-hidden="true"></i></a>
';
}
else
{
$modify='';
}





print <<<EOT


                                                    <!-- .col-md-4 -->
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="collection-items">
                                                            <div class="collection-img">
                                                                <a href="index.php?action=singleitem&index=$index"><img src=$pic></a>
                                                            </div>
                                                            <!-- .collection-img -->
                                                            <div class="collection-content">
                                                                <h4><a href="index.php?action=singleitem&index=$index">$name</a></h4>
                                                                <h5>$price</h5>
                                                                $modify
                                                            </div>
                                                            <!-- .collection-content -->
                                                        </div>
                                                        <!-- .collection-items -->
                                                    </div>
                                                    <!-- .col-md-4 -->

EOT;

}


$leftpage=$page-1;
$rightpage=$page+1;

$pagegoleft=
'
                                                        <li>
                                                            <a href="index.php?action=shop&category='.$category.'&search='.$search.'&page='.$leftpage.'" aria-label="Previous">
                                                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                                            </a>
                                                        </li>

';

$pagegoright=
'
                                                        <li>
                                                            <a href="index.php?action=shop&category='.$category.'&search='.$search.'&page='.$rightpage.'" aria-label="Next">
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
                                    </div>
                                </div>
                            </div>
                            <!-- .col-md-12 -->

                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .shop-option -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Shop Project Section -->
EOT;
?>
