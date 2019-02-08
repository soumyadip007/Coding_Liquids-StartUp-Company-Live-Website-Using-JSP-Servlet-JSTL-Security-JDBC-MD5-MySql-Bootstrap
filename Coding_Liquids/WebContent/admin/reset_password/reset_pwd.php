<?php include "includes/db_conn.php" ?>
<?php include "includes/pwdEncryption.php" ?>
<?php
   if(isset($_GET['email']) && isset($_GET['token']) && isset($_POST['password'])){
       $email=mysqli_real_escape_string($conn,$_GET['email']);
       $token=mysqli_real_escape_string($conn,$_GET['token']);

       //Token and token_expiry checking. If check successful, get the user from the DB
       $query_token_check = "SELECT * FROM users WHERE user_token = '$token' AND user_email = '$email' AND TIME(token_expire) > TIME(NOW()) AND user_token<>'' ";
       $result_token_check = mysqli_query($conn,$query_token_check);
       if(!$result_token_check){
           Die("Error. ".mysqli_error($conn));
       }
       if(mysqli_num_rows($result_token_check)>0){

           $pwd_to_be_updated = crypt(mysqli_real_escape_string($conn,$_POST['password']),$hashF_and_salt);

           //Password update query
           $update_password_query = "UPDATE users SET user_pwd = '$pwd_to_be_updated' WHERE user_email = '$email'";
           $update_password_result = mysqli_query($conn,$update_password_query);

           if($update_password_result){
               //exit("password updated successfully!");
               header('Location: http://localhost/codingLiquids/admin/reset_password/reset_pwd.php?status=success');
           }else{
               //die("Error. ".mysqli_error($conn));
               header('Location: http://localhost/codingLiquids/admin/reset_password/reset_pwd.php?status=failure');
           }
       }else{
           header('Location: http://localhost/codingLiquids/admin/reset_password/reset_pwd.php?status=failure');

       }
   }
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Reset Password</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


        <!--     Fonts and icons     -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- my styles -->
        <link href="styles.css" rel="stylesheet">

    </head>
    <body>

    <div class="form-gap"></div>
    <div class="container">

        <?php
        if(!isset($_GET['status'])){
            include "includes/reset_form_markup.php";
        }else if(isset($_GET['status'])){
            include "includes/status_markup.php";
        }

        ?>

    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        setInterval(function(){
            var pwd = document.querySelector(".pwd").value;
            var confirm_pwd = document.querySelector(".confirm_pwd").value;
            var subBtn = document.querySelector(".submit_btn");

            if(pwd == 0){
                subBtn.disabled = true;
            }else if (pwd == confirm_pwd){
                subBtn.disabled = false;
            } else {
                subBtn.disabled = true;
            }
        },100);
    </script>


    </body>
