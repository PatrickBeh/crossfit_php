<?php
    require('../includes/db_link.inc.php');
    require('../includes/functions.inc.php');
    $pdo;
    $func = new allFunctions();

    // Here is php for Create Workout
    if(isset($_POST['workout_registration'])){
        $func->createWorkout($_POST);
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
                
                    <a href="#"><img src="crossfit-icon.png" alt=""></a>
                    <div class="text__logo">
                        <a href="#"><h1>Crossfit Southport</h1></a>
                        <a href="#"><p>Lorem ipsum dolor sit amet.</p></a>
                    </div>
            </div>
            <div class="links">
                <ul>
                    <li class="item"><a href="dashboard_user.php">User Section</a></li>
                    <li class="item"><a href="dashboard_class.php">Class Section</a></li>
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
                    <div class="select">
                        <label for="select_exercise">Select Exercise</label>
                        <select name="select_exercise">
                            <!-- Add PHP to get informations from exercises at database -->
                            <option value="">Select Exercise</option>
                            <option value="">Exercise 1</option>
                            <option value="">Exercise 2</option>
                            <option value="">Exercise 3</option>
                        </select>
                    </div>
                    <h3>Add informations at the section required</h3>
                    <div class="input">
                        <label for="workout_time">Add Time For Workout</label>
                        <input type="text" name="workout_time">
                    </div>
                    <div class="input">
                        <label for="workout_set_and_reps">Add Set and Reps for Workout</label>
                        <input type="text" name="workout_set_and_reps">
                    </div>
                    <!-- Add Button to Add more gaps for Exercises -->
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
                        <!-- Add PHP To Show Workouts -->
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <!-- Add PHP To Show Workouts -->
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <!-- Add PHP To Show Workouts -->
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <!-- Add PHP To Show Workouts -->
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------Link Workout To Class---------------- -->
            <div class="form__section">
                <h2>Link Workout To Class</h2>
                <div class="select">
                    <label for="select_workout">Select Workout</label>
                    <select name="select_workout">
                        <option value="">Select Workout</option>
                        <option value="">Workout 1</option>
                        <option value="">Workout 2</option>
                        <option value="">Workout 3</option>
                    </select>
                </div>
                <div class="select">
                    <label for="select_class">Select Class</label>
                    <select name="select_class">
                        <option value="">Select Class</option>
                        <option value="">Class Monday</option>
                        <option value="">Class Tuesday</option>
                        <option value="">Class Friday</option>
                    </select>
                </div>
                <div class="button">
                    <input type="hidden" name="workout_to_class_registration">
                    <button type="submit">Link Workout To Class</button>
                </div>
            </div>
            <!-- ----------------List Workout To CLass-------------------- -->
            <div class="list__section">
                <h2>Class with Workout</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Monday</h3>
                        <h3>Workout 1</h3>
                        <!-- Create a new section and get informations From database with exercises in the workout -->
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Monday</h3>
                        <h3>Workout 1</h3>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Monday</h3>
                        <h3>Workout 1</h3>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Monday</h3>
                        <h3>Workout 1</h3>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>