
<!doctype html>
<?php include "includes/head_body_static.php" ?>
<?php include "includes/pwdEncryption.php" ?>

<body>

<div class="wrapper">

    <?php include "includes/sidebar_topbar.php";?>

    <?php

    //Code for updating users

    if(isset($_POST['submit'])){

        $update_username = $_POST['username'];
        $update_email = $_POST['useremail'];
        $update_firstname = $_POST['firstname'];
        $update_lastname = $_POST['lastname'];
        $update_country = $_POST['country'];
        $update_password = $_POST['password'];
        $update_bio = $_POST['bio'];

        $user_id = $_SESSION['user_id'];

        if($update_password === '' || $update_password === null){

            $query_update = "UPDATE users SET user_name = '{$update_username}', user_email='{$update_email}',";
            $query_update .= "first_name='{$update_firstname}',last_name='{$update_lastname}',";
            $query_update .= "country='{$update_country}',user_bio='{$update_bio}'";
            $query_update .=  " WHERE user_id = '{$user_id}'";

        }else{
            $encrypted_pwd = crypt($update_password, $hashF_and_salt);

            $query_update = "UPDATE users SET user_name = '{$update_username}', user_email='{$update_email}',user_pwd='{$encrypted_pwd}',";
            $query_update .= "first_name='{$update_firstname}',last_name='{$update_lastname}',";
            $query_update .= "country='{$update_country}',user_bio='{$update_bio}'";
            $query_update .=  " WHERE user_id = '{$user_id}'";
        }

        $update_result = mysqli_query($conn, $query_update);
        if(!$update_result) {
            die("Error. Error Description: " . mysqli_error($conn));
        }else{

            $update_success_query = "SELECT * FROM users WHERE user_id = '{$user_id}'";
            $update_success_result = mysqli_query($conn,$update_success_query);

            while ($row = mysqli_fetch_assoc($update_success_result)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION["user_name"] = $row['user_name'];
                $_SESSION["user_email"] = $row['user_email'];
                $_SESSION["user_pwd"] = $row['user_pwd'];
                $_SESSION["first_name"] = $row['first_name'];
                $_SESSION["last_name"] = $row['last_name'];
                $_SESSION["country"] = $row['country'];
                $_SESSION["user_bio"] = $row['user_bio'];
            }
            echo '<div class="alert alert-success invalid-username-password"><h4 class="text-center" style="font-weight: bold;line-height: 2rem;padding-top: 1rem;">Profile Updated!</h4></div>
    ';
        }
    }
    ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Admininstrator Profile</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="Coding Liquids.">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $_SESSION["user_name"]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Email">Email address</label>
                                                <input type="email" name="useremail" class="form-control" placeholder="Email" value="<?php echo $_SESSION["user_email"]; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="firstname" class="form-control" placeholder="Company" value="<?php echo $_SESSION["first_name"];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $_SESSION["last_name"];?>">
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <br/>
                                                <label>Country</label>
                                                <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo $_SESSION["country"];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                              <label>New Password</label><br/>
                                               <small class="small">Leave the field blank if you don't want to change your password.</small>
                                              <input type="password" class="form-control" name="password">
                                          </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin:0 auto;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" name="bio" class="form-control"><?php echo $_SESSION["user_bio"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group"  style="margin-left: 20px;">
                                        <button type="submit" name="submit" class="btn btn-success h4">Update Profile</button>
                                    </div>
                                  </div>
                                </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


</body>

<?php include "includes/footer_static.php"?>