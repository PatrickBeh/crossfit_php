<?php
    require('../includes/functions.inc.php');
    require('../includes/db_link.inc.php');
    $pdo;
    $func = new allFunctions();   
    // I am trying to define account type and open a specific page. Work tomorrow on it.
    // $account_type = validate_user($db_connect,$username, $password);


    // Here is php for Create User by user_registration
    if(isset($_POST['user_registration'])){
        $func->createUser($_POST);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_dashboard.css">
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
                    <li class="item"><a href="#">User Section</a></li>
                    <li class="item"><a href="dashboard_class.php">Class Section</a></li>
                    <li class="item"><a href="dashboard_exercise.html">Exercise Section</a></li>
                    <li class="item"><a href="dashboard_workout.html">Workout Section</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar__form">
            <!-- --------------Login section--------------- -->
            <!-- Apply PHP here to use the user's name from database -->
            <h2>Welcome user</h2>
        </div>
    </header>
    <main>
        <div class="main--wrapper">

            <!-- ------------------------Create User Section--------------- -->
            <div class="form__section">
                <!-- -----------------Create a new User Form--------------- -->
                <h2>Create a New User</h2>
                <form method="post">
                    <div class="input">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name">
                    </div>
                    <div class="input">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name">
                    </div>
                    <div class="input">
                        <label for="email">Email:</label>
                        <input type="email" name="email">
                    </div>
                    <div class="input">
                        <label for="username">Create Username:</label>
                        <input type="text" name="username">
                    </div>
                    <div class="input">
                        <label for="password">Create Password:</label>
                        <input type="password" name="password">
                    </div>
                    <div class="select">
                        <label for="account_type">Account Type:</label>
                        <select name="account_type">
                            <option value="member">Member</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="button">
                        <input type="hidden" name="user_registration">
                        <button type="submit">Register New User</button>
                    </div>
                </form>
            </div> 
            
            <!-- --------------------------------List Staff Section---------------------- --> 
            <div class="list__section">
                <h2>Our Staff</h2>
                <div class="list__section__wrapper">
                <!-- ---------------------------------- Apply PHP for this section to show name and position from database -->
                    <div class="card">
                        <?php
                            $list = $func->listUser();
                            if($list):
                                foreach($list as $item):
                                    if($item['account_type'] != 'staff'){
                                        continue;
                                    }
                        ?>
                        <h3><?= $item['firstname'].' '.$item['lastname'];?></h3>
                        <h4><?= $item['account_type']; ?></h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                        
                    </div>
            </div>
            <div class="list__section">
                <h2>Our Member</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                    <?php
                            $list = $func->listUser();
                            if($list):
                                foreach($list as $item):
                                    if($item['account_type'] != 'member'){
                                        continue;
                                    }
                        ?>    
                        <h3><?= $item['firstname']. ' '.$item['lastname'];?></h3>
                        
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>