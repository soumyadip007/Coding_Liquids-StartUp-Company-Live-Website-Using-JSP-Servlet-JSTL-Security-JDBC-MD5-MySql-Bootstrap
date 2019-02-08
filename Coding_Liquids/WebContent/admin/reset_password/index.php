<?php include "includes/db_conn.php" ?>
<?php

    use PHPMailer\PHPMailer\PHPMailer;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/POP3.php';


    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $query = "SELECT * FROM users WHERE user_email = '{$email}'";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Error. ".mysqli_error($conn));
        }
        if(mysqli_num_rows($result)>0){
            //code to create token
            $random_string = "dsfSDFASdklkLLOOpdsaAAdcAt234522";
            $token = str_shuffle($random_string);
            $token = substr($token,0,10);

            //code to set the token in database and set a token timeout
            $token_query = "UPDATE users SET user_token = '{$token}', 
              token_expire = DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE user_email = '{$email}'";

            $token_result = mysqli_query($conn,$token_query);
            if(!$token_result){
                die("Error2. ".mysqli_error($conn));
            }

            //code to send email using PHPMailer

            $mail = new PHPMailer();
            try {
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = '0e306176deaf74';                 // SMTP username
                $mail->Password = '41e70aeae8c3b1';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to

                $mail->setFrom('arkaprabha.chatterjee31@gmail.com', 'Webmaster');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Reset Password';
                $mail->Body = "Hi, <br/><br/>
                We have received a request of changing your password. Please click the link below to reset your password.<br/><br/>
                                  <a href='http://localhost/codingLiquids/admin/reset_password/reset_pwd.php?token=$token&email=$email'>http://localhost/codingLiquids/admin/reset_password/reset_pwd.php?token=$token&email=$email</a>
                <br/><br/>If you feel that you have received this by mistake. Please ignore the email or report suspicious activity to the webmaster.
                <br/><br/>
                Regards,<br/>
                Webmaster.";


                if ($mail->send()) {
                    exit(json_encode(array('message'=>'Check your inbox!','status' => 1)));
                } else {
                    exit(json_encode(array('message'=>'Something wrong happened. Try again later.','status' => 0)));
                }
            }catch (Exception $e) {
                exit(json_encode(array('message'=>$e->getMessage(),'status' => 0)));
            }

        }else{
            exit(json_encode(array('message'=>'Something wrong happened. Try again later.','status' => 0)));
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- my styles -->
    <link href="styles.css" rel="stylesheet">

</head>
<body>

  <div class="form-gap"></div>
    <div class="container">
    	<div class="row">
    		<div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="text-center">
                      <h3><i class="fa fa-lock fa-4x"></i></h3>
                      <h2 class="text-center">Forgot Password?</h2>
                      <p>Enter your registered email here.</p>
                      <div class="panel-body">





                          <div class="form-group">

                              <input id="email" name="email" placeholder="email address" class="form-control"  type="email">

                          </div>
                          <div class="form-group">
                            <input name="submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit" disabled>
                          </div>





                      </div>
                    </div>
                  </div>
                </div>
              </div>
    	</div>
        <div style="font-size:3.5em; color:limegreen" class="text-center loader" style="display: none;">
            <i class="far fa-compass fa-spin"></i>
        </div>
        <p id="responseText" class="text-center"></p>
    </div>
  
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  
<script type="text/javascript">
    setInterval(function () {

        var email = document.querySelector("#email").value;
        var subBtn = document.querySelector(".btn");

        if(email === ''){
            subBtn.disabled = true;
        } else {
            subBtn.disabled = false;
        }


    },100);
</script>
  <script type="text/javascript">



    $(document).ready(function () {

        $(".loader").css("display", "none");

        $('.btn').click(function () {

            console.log($("#email").val());
            $(".loader").css("display", "block");


            $.ajax({
                url: 'index.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    email: $("#email").val()
                },
                success: function(response) {
                    $('#responseText').html(response.message).css({"font-size": "2.2rem", "color":"green"});
                    $(".loader").css("display", "none");
                },
                error: function(response) {
                    $('#responseText').html(response.message).css({"font-size": "2.2rem", "color":"red"});
                    $(".loader").css("display", "none");
                }
            });
        });
    });
    
    
</script>

</body>
</html>