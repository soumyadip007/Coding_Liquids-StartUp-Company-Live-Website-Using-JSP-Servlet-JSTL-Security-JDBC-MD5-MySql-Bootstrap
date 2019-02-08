

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Events | Coding Liquids</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/events.css">
</head>
<body>
<!---content to be displayed after loading-->
<div class="wrapper">
    <div class="container-fluid">
        <div class="hamburger">
            <span>menu </span>
            <span class="close">close</span>
            <i class="material-icons close">close</i>
            <i class="material-icons">menu</i>
        </div>
    </div>
    <!---Fullscreen menu-->
    <div class="menu hidden">
        <div class="container">
            <h4>MENU</h4>
            <div class="row">
                <div class="col-2">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="comingsoon.php">What We Do</a></li>
                        <!--     <li><a href="comingsoon.php">Portfolio</a></li> -->

                    </ul>
                </div>
                <div class="col-2">
                    <ul>
                        <li><a href="comingsoon.php">Team</a></li>
                        <li><a href="events.php">Events</a></li>
                        <!--    <li><a href="comingsoon.php">Career</a></li>  -->

                    </ul>
                </div>
            </div>

            <div class="get-quote">
                <h5>Have a project in mind?</h5>
                <a href="getquote.php" class="call-to-action">Lets Talk</a>
            </div>
            <div class="social">
                <div class="icon-wrapper"><a href=""> <img src="img/insta.svg" alt="Instagram Icon"></a> </div>
                <div class="icon-wrapper"><a href=""><img src="img/fb.svg" alt="Facebook Icon"></a></div>
                <div class="icon-wrapper"><a href=""><img src="img/twit.svg" alt="Twitter Icon"></a></div>
            </div>

        </div>
    </div>



    <div class="hero-img">
            <div class="container">
                <h2>Events & Workshops </h2>
                <!--<p>Find an event near you and register yourself before the seats are booked.</p>-->
            </div>
    </div>



    <section id="events">
        <div class="container">
            <div class="card">
            <div class="event-content">
              <h4>Cyber Awareness Programme</h4>
              <p class="date"> 31st March and 1st April.</p>
              <h6>Insight on Malware Trends, Identity Theft & Protection, Introduction to Anonymizers, TAIL System, G-Zapper, Password, MITM & Replay Attack Countermeasures, Stats on Financial Loss.Introduction to Viruses, Indications & Recovery, Ransomware, Miners, Worms, Spywares, Trojans, Wiretapping, Lawful Interception, NSA PRISM, Social Engineering, Wireless Attacks, Countermeasures & Defence on Mobile Platforms.Backdooring Mobile & PC platforms, Insights on privacy & information protection on Social Media Platforms such as Facebook, WhatsApp, Instagram, etc.Introduction to Network Infrastructure, Wi-Fi Threat Management, Android Rooting & iOS Jailbreak, Introduction to VM Ware, Kali Linux, Metasploit, OS Breaching, Home Automation & Security Enhancement, Distribution of Freeware used during Events.</h6>
              <a href="https://goo.gl/forms/TrMshG1DF4HIkrni1" class="call-to-action" >Register Now</a>
            </div>
            </div>
            <div class="card">
            <div class="event-content">
              <h4>Cyber Awareness Programme</h4>
              <p class="date"> 31st March and 1st June.</p>
              <a href="" class="call-to-action">Register Now/See details</a>
            </div>
            </div>


        </div>
    </section>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <ul>
                        <li><a href="comingsoon.php">Coding Liquids</a></li>
                        <li><a href="comingsoon.php">Portfolio</a></li>
                        <li><a href="comingsoon.php">Team</a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <ul>
                        <li><a href="">What We Do</a></li>
                        <li><a href="">Events</a></li>
                        <li><a href="">Career</a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <p>Address: Newtown, Kolkata-700157</p>
                    <p>+91 8017742989</p>
                    <div class="social">
                        <div class="icon-wrapper"><a href=""> <img src="img/insta.svg" alt="Instagram Icon"></a> </div>
                        <div class="icon-wrapper"><a href=""><img src="img/fb.svg" alt="Facebook Icon"></a></div>
                        <div class="icon-wrapper"><a href=""><img src="img/twit.svg" alt="Twitter Icon"></a></div>

                    </div>
                </div>
                <p>&copy; Coding Liquids 2018.</p>
            </div>
        </div>
    </footer>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript">
    $(window).scroll(function(){
        var $wScroll = $(this).scrollTop();
        var $heroHeight = $(window).height();
        $heroHeight = $heroHeight - ($heroHeight/5);
        if(($wScroll > ($heroHeight - 20))) {
            $('.hamburger span, .hamburger .material-icons').css({"color": "#000"});
        }
        else{
            $('.hamburger span, .hamburger .material-icons').css({"color": "#fff"});
        }
        $('.hamburger .close').css({"color": "#fff"});
    });
</script>
</body>
</html>