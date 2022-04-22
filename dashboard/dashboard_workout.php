<?php
    require('../includes/db_link.inc.php');
    require('../includes/functions.inc.php');
    $pdo;
    $func = new allFunctions();

    // Here is php for Create Workout
    if(isset($_POST['workout_registration'])){
        $func->createWorkout($_POST);
    }
    // Here is php to link workout with member
    if(isset($_POST['workout_to_member_registration'])){
        $func->linkWorkoutToMember($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Workout</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_dashboard.css">
</head>
<body>
    <header>
        <div class="navbar__logo">
            <div class="logo">
                
                    <a href="#"><img src="../crossfit-icon.png" alt=""></a>
                    <div class="text__logo">
                        <a href="#"><h1>Crossfit Southport</h1></a>
                        <a href="#"><p>Lorem ipsum dolor sit amet.</p></a>
                    </div>
            </div>
            <div class="links">
                <ul>
                    <li class="item"><a href="dashboard_user.php">User Section</a></li>
                    <li class="item"><a href="dashboard_exercise.php">Exercise Section</a></li>
                    <li class="item"><a href="#">Workout Section</a></li>
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
            <!-- ----------------------Add Workout---------------- -->
            <div class="form__section">
                <h2>Add Workout</h2>
                <form method="post">
                    <div class="input">
                        <label for="workout_name">Add Workout Name</label>
                        <input type="text" name="workout_name">
                    </div>
                    <div class="textarea">
                        <label for="workout_description">Add Workout Description</label>
                        <textarea name="workout_description"></textarea>
                    </div>
                    <!-- Create a button add more exercises -->
                    <div class="exercise">

                        <div class="input">
                            <label for="reps">Reps</label>
                            <input type="text" name="reps">
                        </div>
                        <div class="select">
                            <label for="select_exercise">Select Exercise</label>
                            <select name="select_exercise">
                                
                                <?php 
                                $list = $func->selectExercise();
                                if($list):
                                    foreach($list as $item):
                                        ?>
                            <!-- Add PHP to get informations from exercises at database -->
                            <!-- How to sync id to this item? -->
                            <option value="<?= $item['id'];?>"><?= $item['exercise_name']; ?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select>
                        </div>
                        <div class="edit__button">
                            <button type="submit">Add Exercise</button>
                        </div>
                    </div>
                    <!-- Add Button to Add more gaps for Exercises -->
                    <div class="input">
                        <label for="workout_time">Add Time For Workout</label>
                        <input type="text" name="workout_time">
                    </div>
                    
                    <div class="button">
                        <input type="hidden" name="workout_registration">
                        <button type="submit">Register Workout</button>
                    </div>
                </form>
            </div>
            <!-- --------------------List Workout--------------- -->
            <!-- ADD PHP TO SELECT WORKOUT FROM DATABASE -->
            <div class="list__section">
                <h2>Workout Registered</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php 
                            $list = $func->listWorkout();
                            if($list):
                                foreach($list as $item):
                        ?>
                        <h2><?= $item['workout_name']; ?></h2>
                        <p><?= $item['workout_description']; ?></p>
                        <h3><?= $item['reps']." ".$item['exercise_name'] ?></h3>
                        <h4><?= $item['time']; ?></h4>
                            <div class="edit__button">
                                <button type="submit">Edit</button>
                            </div>
                        <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
            <!-- --------------Link Workout To Member---------------- -->
            <div class="form__section">
                <h2>Link Workout To Member</h2>
                <form method="post">                    
                    <div class="select">
                        <label for="select_workout">Select Workout</label>
                        <select name="select_workout">
                            <?php 
                                $list = $func->selectWorkout();
                                if($list):
                                    foreach($list as $item):
                            ?>
                            <option value="<?= $item['id'];?>"><?= $item['workout_name']; ?></option>
                            <?php endforeach;?>
                            <?php endif?>
                        </select>
                    </div>
                    <div class="select">
                        <label for="select_user">Select User</label>
                        <select name="select_user">
                            <?php 
                                $list = $func->selectMember();
                                if($list):
                                    foreach($list as $item):
                            
                            ?>
                            <option value="<?= $item['id']; ?>"><?= $item['firstname']." ".$item['lastname'];?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="button">
                        <input type="hidden" name="workout_to_member_registration">
                        <button type="submit">Link Workout To Member</button>
                    </div>
                </form>
            </div>
            <!-- ----------------List Members with signed workout-------------------- -->
            <div class="list__section">
                <h2>Members with signed Workout</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php 
                            $list = $func->listMemberWithWorkout();
                            if($list):
                                foreach($list as $item):
                        ?>
                        <h3><?= $item['workout_name']; ?></h3>
                        <h3><?= $item['username']." ".$item['lastname']; ?></h3>
                        <!-- Create a new section and get informations From database with exercises in the workout -->
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