<?php
print <<<EOT



<script type="text/javascript">
    function checkform(thisfrm) {
var getfocus="";
var showalert="";

            $.ajax({
                type: "POST",
                dataType: "html",
                url: "template/ajax/chkuser.php",
                async:false,
                data: $("#checkform").serialize(),
                success: function (result) {

getfocus=result;
switch(true)
{
case result==="repass":
showalert="Passwords do not match!";
break;
case result==="account":
showalert="Already exists ! Please Change Your Account.";
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

if (getfocus!=="") {
alert (showalert);
eval("thisfrm."+getfocus+".focus()");
return (false);
}
}
</script>







        <!-- Start Sign Up Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                            <div class="col-lg-12">
                                <h3 class="contact-title">Sign Up</h3>
                                <form action="index.php?action=login" method="POST" class="contact-form" id="checkform" onSubmit="return checkform(this);">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="firstname" placeholder="First Name" maxlength="15" />
                                            </div>
                                            <!-- .form-group -->
                                        </div>
                                        <!-- .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" maxlength="15" />
                                            </div>
                                        </div>
                                        <!-- .col-md-6 -->
                                    </div>
                                    <!-- .row -->


                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" maxlength="15" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email" maxlength="30" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Address" maxlength="30" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="account" placeholder="Account" required="required" maxlength="15" id="account"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" maxlength="30" />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="repass" placeholder="Retype Password" required="required" maxlength="30" id="repass" />
                                    </div>

                                    <button type="submit" name="newuser" class="btn btn-default">Confirm</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sign Up Section -->


EOT;

?>
