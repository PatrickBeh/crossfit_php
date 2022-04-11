<?php 

if (isset($_POST["user_registration"])) {
    
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $account_type = $_POST["account_type"];

    require_once 'db_link.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($first_name, $last_name, $email, $username, $password, $account_type) !== false) {
        header("location: ../dashboard/dashboard_user.php?error=emptyinput");
        exit();
    }
    if(userExists($db, $username, $email) !== false) {
        header("location: ../dashboard/dashboard_user.php?error=usernametaken");
        exit();
    } else {
        header("location: ../dashboard/dashboard_user.php");
        exit();
    }
}