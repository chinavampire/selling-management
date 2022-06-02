<?php
print <<<EOT



<script type="text/javascript">
    function checkform(thisform,account,password) {
        var original = document.getElementById("original").value;  
        var newpass = document.getElementById("newpass").value;  
        var repass = document.getElementById("repass").value;  


     if(original=='') {
      alert('Please input the original password');
      thisform.original.focus();
      return false;
      }
     if(newpass=='') {
      alert('Please input the new password');
      thisform.newpass.focus();
      return false;
      }
     if(repass=='') {
      alert('Please retype the password');
      thisform.repass.focus();
      return false;
      }
     if(newpass!=repass) {
      alert('Passwords do not match');
      thisform.repass.focus();
      return false;
      }
     if(original!=password) {
      alert('invalid original password');
      thisform.original.focus();
      return false;
      }

}
</script>







        <!-- Start Sign Up Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                            <div class="col-lg-12">
                                <h3 class="contact-title">Change Password</h3>
                                <form action="index.php?action=logout" method="POST" class="contact-form" id="checkform" onSubmit="return checkform(this,'$account','$password');">

                                                                        <input type="hidden" name="account" value="$account">

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="original" placeholder="Original Password" required="required" maxlength="30" id="original" />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="newpass" placeholder="New Password" required="required" maxlength="30" id="newpass" />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="repass" placeholder="Retype New Password" required="required" maxlength="30" id="repass" />
                                    </div>

                                    <button type="submit" name="changepassword" class="btn btn-default">Confirm</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sign Up Section -->


EOT;

?>
