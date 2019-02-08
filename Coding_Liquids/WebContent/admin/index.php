<?php include "includes/db_conn.php"; ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CodingLiquids Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>

<body class="text-center">

<div class="form-signin">


    <div class="alert alert-danger invalid-username-password" style="display: none;">

    </div>


    <h1 class="h3 mb-3 font-weight-normal">Administrator Sign In</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <!--<div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>-->
    <br/>
    <a href="/codingLiquids/admin/reset_password" class="text-center">Forget Password</a>
    <br/><br/>
    <input class="btn btn-lg btn-primary btn-block" value='Sign in' type="button"></input>


    <div class="mt-5 mb-3 text-muted">
       <p class="site-footer__fineprint" id="fineprint">Made with <i class="far fa-heart" style="color: red; font-size:1.5em;"></i> by Discrete</p>
    </div>


</div>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $('.btn').click(function () {
            $(this).val('......');

            $.ajax({
                url: 'includes/login.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    email: $("#inputEmail").val(),
                    password : $("#inputPassword").val()
                },
                success:function(response){
                    if(response.status===0){
                        window.location = "./dashboard.php";
                    }else if(response.status){
                        $('.invalid-username-password').css({"display": "block"}).html(response.message);
                    }
                    $('.btn').val('Sign in');
                },
                error: function (response) {
                    $('.invalid-username-password').css({"display": "block"}).html("Some error occured.");
                    $('.btn').val('Sign in');

                }
            });
        });
    });

</script>
</body>
</html>