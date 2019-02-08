<?php
echo '
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">



                                <form action="" method="post">

                                    <div class="form-group">

                                        <input name="password" placeholder="Enter your new password" class="form-control pwd"  type="password">
                                        <br/>
                                        <input name="password-confirm" placeholder="Retype your new password" class="form-control confirm_pwd" type="password">

                                    </div>

                                    <div class="form-group">
                                        <input name="submit" class="btn btn-lg btn-primary btn-block submit_btn" value="Reset Password" type="submit" disabled>
                                    </div>

                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            ';
?>