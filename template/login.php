<?php
print <<<EOT


        <!-- Start Login Section -->
        <section class="bg-contact-us">
            <div class="container">
                <div class="row">
                    <div class="contact-us">
                            <div class="col-lg-12">
                                <h3 class="contact-title">Login</h3>
                                <form action="index.php" method="POST" class="contact-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="account" placeholder="Your Account" />
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Your Password" />
                                    </div>


                                    <button type="submit" name="check_login" class="btn btn-default">Login</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Section -->


EOT;

?>
