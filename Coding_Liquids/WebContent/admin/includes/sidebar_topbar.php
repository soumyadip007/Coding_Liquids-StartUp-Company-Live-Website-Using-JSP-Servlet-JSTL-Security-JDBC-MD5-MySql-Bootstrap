
<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">Coding Liquids</a>
        </div>

        <ul class="nav">
            <li>
                <a href="../admin/dashboard.php">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="user.php">
                    <i class="pe-7s-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="../admin/add_event.php">
                    <i class="pe-7s-note2"></i>
                    <p>Add Events</p>
                </a>
            </li>
            <li>
                <a href="../admin/remove_event.php">
                    <i class="pe-7s-note2"></i>
                    <p>Remove Events</p>
                </a>
            </li>

        </ul>
    </div>
</div>

<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">Welcome, <?php echo $_SESSION["user_name"]?></span>
            </div>
            <div class="collapse navbar-collapse">


                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="user.php">
                            <p>Account</p>
                        </a>
                    </li>
                    <li>
                        <a href="includes/logout.php">
                            <p>Log out</p>
                        </a>
                    </li>
                    <li class="separator hidden-lg"></li>
                </ul>
            </div>
        </div>
    </nav>
