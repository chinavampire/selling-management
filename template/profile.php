<?php




print <<<EOT


        <!-- Start Sign Up Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                            <div class="col-lg-12">
                                <h3 class="contact-title">Profile</h3>
                                <form action="index.php" method="POST" class="contact-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="firstname" placeholder="First Name" maxlength="15" value=$firstname />
                                            </div>
                                            <!-- .form-group -->
                                        </div>
                                        <!-- .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" maxlength="15" value=$lastname />
                                            </div>
                                        </div>
                                        <!-- .col-md-6 -->
                                    </div>
                                    <!-- .row -->


                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" maxlength="15" value=$phonenumber />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email" maxlength="30" value=$email />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Address" maxlength="30" value=$address />
                                    </div>

                                    <button type="submit" name="profile" class="btn btn-default">Confirm</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sign Up Section -->


EOT;

?>
