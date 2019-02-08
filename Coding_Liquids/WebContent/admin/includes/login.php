<?php include "db_conn.php"; ?>
<?php include "pwdEncryption.php" ?>

<?php
session_start();
   /*
    * Login in and session start for particular user script
    */
if(isset($_POST['email']) && isset($_POST['password'])){
    $admin_email =  mysqli_real_escape_string($conn , $_POST['email']);
    $admin_pwd = mysqli_real_escape_string($conn , $_POST['password']);


    /*sign in queries*/
    /*It encrypts the user entered password at login*/
    /*hashF_and_salt value is coming from pwdEncryption.php*/

    $encrypted_atlogin_pwd = crypt($admin_pwd, $hashF_and_salt);

    $signin_query = "SELECT * FROM users WHERE user_email = '{$admin_email}' AND user_pwd = '{$encrypted_atlogin_pwd}'";
    $signin_result = mysqli_query($conn,$signin_query);

    if(mysqli_num_rows($signin_result)==0){
        exit(json_encode(array('message'=>'Invalid password or email','status' => 1)));
    }else{

        while ($row = mysqli_fetch_assoc($signin_result)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION["user_name"] = $row['user_name'];
            $_SESSION["user_email"] = $row['user_email'];
            $_SESSION["user_pwd"] = $row['user_pwd'];
            $_SESSION["first_name"] = $row['first_name'];
            $_SESSION["last_name"] = $row['last_name'];
            $_SESSION["country"] = $row['country'];
            $_SESSION["user_bio"] = $row['user_bio'];
        }

        //header('Location: ../dashboard.php');
        exit(json_encode(array('message'=>'Redirecting....','status' => 0)));

    }
}