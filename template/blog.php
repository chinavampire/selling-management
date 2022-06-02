<?php


if ($privilege==="admin")
{

if (isset($_GET['del']))
{
$index=$_GET['del'];
$folderPath = "pic/blog/".$index."-";
$totalFiles = glob($folderPath . "*");
foreach($totalFiles as $k=>$v){
//echo $k."=>".$v."<br />";
unlink($v);
}
mysqli_query($conn,"delete from $blogtable where `index`='$index'");
}


print <<<EOT
<div style="text-align:center;">

                                    <form action="index.php?action=newblog" method="post">
                                        <button type="submit" class="btn btn-default">Create</button>
                                    </form>

</div>
EOT;
}

print <<<EOT


        <!-- Start Single Events Section -->
        <section class="bg-blog-style-2">
            <div class="container">
                <div class="row">
                    <div class="blog-style-2">
                        <div class="row">





                    <div class="recent-project">
                        <div id="filters" class="button-group ">


EOT;


$amount=10;
$page=$_GET['page'];
$showstarting=$amount*($page-1)+1;
$showending=$amount*$page;
$category="";
$search="";
$fetchheader="select count(1) ";
$fetch=" from $blogtable where 1=1";


if (isset($_GET['category']) and $_GET['category']<>'')
{
$category=$_GET['category'];
$fetch.=" and category='".$category."'";
}



if (isset($_POST['search']) and $_POST['search']<>'')
{
$search=$_POST['search'];
$fetch.=" and (binary title LIKE '%$search%' or binary location LIKE '%$search%' or binary text LIKE '%$search%') ";
}
if (isset($_GET['search']) and $_GET['search']<>'')
{
$search=$_GET['search'];
$fetch.=" and (binary name LIKE '%$search%' or binary location LIKE '%$search%' or binary text LIKE '%$search%') ";
}


$fetch.="  group by category,title order by category";



$fetchtotalrec=$fetchheader.$fetch;

$fetchtotalrec="select count(1) as totalrec from (".$fetchtotalrec.") x";


$fetchtotalrec=mysqli_query($conn,$fetchtotalrec);
$fetched = mysqli_fetch_array($fetchtotalrec);
$totalrec = $fetched['totalrec'];
if ($totalrec<$showending)
{
$showending=$totalrec;
}

$fetchcategory = mysqli_query($conn,"select * from $blogtable group by category");
while($fetched = mysqli_fetch_array($fetchcategory)){
$fetchedcategory=$fetched['category'];

print <<<EOT


                            <a href="index.php?action=blog&page=1&category=$fetchedcategory"><button class="button is-checked">$fetchedcategory</button></a>

EOT;

}








print <<<EOT





                        </div>
                    </div>








                                    <div class="widget">
                                        <div class="shop-widget-content">
                                            <form action="index.php?action=blog&page=1" method="POST" class="sidebar-form" name="searchform">
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


if ($privilege==="admin")
{
$modify=
'
<li><a href="index.php?action=modifyblog&index='.$index.'"><i class="fa fa-pencil" aria-hidden="true">Modify</i></a></li>
<li><a href="index.php?action=blog&page=1&del='.$index.'"><i class="fa fa-trash" aria-hidden="true">Delete</i></a></li>
';
}
else
{
$modify='';
}





print <<<EOT


                            <div class="col-lg-12"><br><br>


                                <div class="blog-items">
                                    <div class="blog-img">
                                        <a href="index.php?action=singleblog&index=$index"><img src=$pic class="img-responsive" style="height:300px;"></a>
                                    </div>
                                    <!-- .blog-img -->
                                    <div class="blog-content-box">
                                        <div class="blog-content">
                                            <h4>$title</h4>
                                            <ul class="meta-post">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> $date</li>
                                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> $location</li>
                                                $modify
                                            </ul>
                                            <p>$text </p>
                                         </div>
                                        <!-- .blog-content -->
                                    </div>
                                    <!-- .blog-content-box -->
                                </div>
                                <!-- .blog-items -->

EOT;

}


$leftpage=$page-1;
$rightpage=$page+1;

$pagegoleft=
'
                                                        <li>
                                                            <a href="index.php?action=blog&category='.$category.'&search='.$search.'&page='.$leftpage.'" aria-label="Previous">
                                                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                                            </a>
                                                        </li>

';

$pagegoright=
'
                                                        <li>
                                                            <a href="index.php?action=blog&category='.$category.'&search='.$search.'&page='.$rightpage.'" aria-label="Next">
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
                            <!-- .col-md-12 -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .blog-style-2 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- End Single Events Section -->
EOT;
?>
