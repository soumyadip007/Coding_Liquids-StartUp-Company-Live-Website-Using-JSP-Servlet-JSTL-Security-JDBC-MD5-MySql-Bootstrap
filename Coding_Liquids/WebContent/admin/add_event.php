<?php include "includes/head_body_static.php" ?>

<body>

<div class="wrapper">


    <?php include "includes/sidebar_topbar.php";?>

    <?php
    if(isset($_POST['submit'])){
        $prog_name = $_POST['program-name'];
        $prog_start_date = $_POST['program-start-date'];
        $prog_end_date = $_POST['program-end-date'];
        $prog_venue = $_POST['program-venue'];
        $prog_link = $_POST['register-link'];
        $prog_detail = $_POST['program-detail'];
        $post_author = $_SESSION["first_name"]; //Remove/modify post author when adding sessions and auth

        $query = "INSERT INTO posts(program_name, program_start_date, program_end_date, program_venue, program_detail, register_link, author, 
posting_date) VALUES('{$prog_name}','{$prog_start_date}','{$prog_end_date}','{$prog_venue}','{$prog_detail}','{$prog_link}',
'{$post_author}',now())";

        $result = mysqli_query($conn,$query);
        if(!$result) {
            die("Error.Contact Webmaster.Error Description: " . mysqli_error($conn));
        }else{
            echo '<div class="alert alert-success invalid-username-password"><h4 class="text-center" style="font-weight: bold;line-height: 2rem;padding-top: 1rem;">Post Created!</h4></div>';
        }
    }
    ?>

        <!--Main Content for add events-->
        <div class="container-fluid">
            <form action="" method="post">
                <div class="form-group">
                    <label for="program-name" class="h3">Event name:</label>
                    <input type="text" class="form-control" name="program-name">
                </div>
                <div class="form-group">
                    <label for="program-start-date" class="h3">Event start date:</label>
                    <input type="date" class="form-control" name="program-start-date">
                </div>
                <div class="form-group">
                    <label for="program-end-date" class="h3">Event end date:</label>
                    <input type="date" class="form-control" name="program-end-date">
                </div>
                <div class="form-group">
                    <label for="program-venue" class="h3">Event venue:</label>
                    <input type="text" class="form-control" name="program-venue">
                </div>
                <div class="form-group">
                    <label for="register-link" class="h3">Google Form link:</label>
                    <input type="text" class="form-control" name="register-link">
                </div>
                <div class="form-group">
                    <label for="program-detail">Details:</label>
                    <textarea class="form-control" rows="10" name="program-detail" style="height:250px !important;"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success h4">add event</button>
                </div>

                <!--To Do: Add user name who is posting the event and cur date of posting-->
            </form>
        </div>

    </div>
</div>

</body>

<?php include "includes/footer_static.php"?>
