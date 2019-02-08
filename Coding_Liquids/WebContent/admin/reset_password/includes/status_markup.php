<?php
$status = $_GET['status'];
if($status === 'success') {
echo '<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        .site-header{padding:20px 0 0 !important;} 
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    <!-- my styles -->
    <link href="../styles.css" rel="stylesheet">
</head>
<body>
<header class="site-header" id="header">
    <h1 class="site-header__title" data-lead-id="site-header-title">Success!</h1>
</header>

<div class="main-content">
    <div style="font-size:9em; color:limegreen">
        <i class="fab fa-angellist"></i>
    </div>
    <p class="main-content__body" data-lead-id="main-content-body">Thanks for filling that out. Your password is reset successfully.</p>
</div>

<footer class="site-footer" id="footer">
    <p class="site-footer__fineprint" id="fineprint">Made with <i class="far fa-heart" style="color: red; font-size:1.5em;"></i> by Discrete</p>
</footer>
</body>
</html>
';
}else if($status === 'failure'){
echo '<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700" rel="stylesheet" type="text/css">
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        .site-header{padding:20px 0 0 !important;} 
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    <!-- my styles -->
    <link href="../styles.css" rel="stylesheet">
</head>
<body>
<header class="site-header" id="header">
    <h1 class="site-header__title" data-lead-id="site-header-title">ERROR</h1>
</header>

<div class="main-content">
    <div style="font-size:9em; color:red">
        <i class="fas fa-exclamation"></i>
    </div>
    <p class="main-content__body" data-lead-id="main-content-body">Oops, Looks like something wrong happened. Try again later or why don\'t you shoot a mail to
        <a href="mailto:arkaprabha.chatterjee31@gmail.com">Webmaster</a></p>
</div>
<footer class="site-footer" id="footer">
    <p class="site-footer__fineprint" id="fineprint">Made with <i class="far fa-heart" style="color: red; font-size:1.5em;"></i> by Discrete</p>
</footer>
</body>
</html>
';
}
?>