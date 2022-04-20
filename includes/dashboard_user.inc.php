<?php 
    require('db_link.inc.php');
    require('functions.inc.php');
    $func = new allFunctions();   
    
    if(isset($_POST['btn_login'])){
        
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['pwd']);

        if(empty($username)){
            
            $errorMsg[] = "Please enter username";
        } else if(empty($password)){
            
            $errorMsg[] = "Please enter password";
        } else {
            try {                
                $select_stmt=$pdo->prepare("SELECT * FROM tb_user WHERE username=:username");
                $select_stmt->bindParam(':username', $username);
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if($select_stmt->rowCount() > 0){
                    if($username==$row["username"]){
                        
                        if($func->password_verify($password, $row["password"])){
                            
                            $_SESSION['user_login'] = $row["id"];
                            $loginMsg = "Successfully Login";
                            header("location: ../dashboard/dashboard_user.php");
                        } else {
                            $errorMsg[] = "wrong password";
                            header("location: ../home_page.php");
                            // Create alert to show the error message
                        }
                    } else {
                        $errorMsg[] = "wrong username";
                        header("location: ../home_page.php");
                    }
                } else {
                    $errorMsg[] = "wrong username";
                    header("location: ../home_page.php");
                }
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }
    }

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