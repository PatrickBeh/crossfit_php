<?php
    session_start();
    include_once('includes/db_link.inc.php');

    $pdo;
    if($pdo){
        echo '<!-- Connection established -->';
    }
    if(isset($_SESSION["user_login"]) && empty($_SESSION["user_login"])){
        header("location: ../home_page.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crossfit Southport</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
            <div class="navbar__logo">
                <div class="logo">
                    
                        <a href="#"><img src="crossfit-icon.png" alt=""></a>
                        <div class="text__logo">
                            <a href="#"><h1>Crossfit Southport</h1></a>
                            <a href="#"><p>Lorem ipsum dolor sit amet.</p></a>
                        </div>
                </div>
                <div class="links">
                    <ul>
                        <li class="item"><a href="#">Home</a></li>
                        <li class="item"><a href="pages/ourHistory.php">Our History</a></li>
                        <li class="item"><a href="pages/timetable.php">Timetable</a></li>
                        <li class="item"><a href="pages/ourBox.php">Our Box</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar__form">
                <!-- Login section -->
                <form action="includes/dashboard_user.inc.php" method="post">
                    <input type="hidden" name="action" value="encrypto">
                    <input type="text" name="username" placeholder="Enter Username">
                    <input type="password" name="pwd" placeholder="Enter Password">
                    <button type="submit" name="btn_login">Login</button>
                </form>
            </div>
    </header>
    <main>
        <div class="main__wrapper">
            <div class="cta-container">
                <img src="images/background.jpg" alt="">
                <div class="text__background">  
                    <div class="text__background__wrapper">
                        <h1>Welcome</h1>
                        <p>Lorem ipsum dolor sit amet. Morbi accumsan eros vel maximus fermentum. Curabitur quis tincidunt sem. Pellentesque vulputate eu leo ac aliquet. Integer.</p>
                        <h2><a href="pages/timetable.html">View Time Table</a></h2>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>
</html>

