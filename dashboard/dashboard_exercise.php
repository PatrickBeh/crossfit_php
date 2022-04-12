<?php

    require('../includes/db_link.inc.php');
    require('../includes/functions.inc.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_POST['add_exercise_type_registration'])){
        $func->createExerciseType($_POST);
    }
    if(isset($_POST['equipment_registration'])){
        $func->createEquipment($_POST);
    }
    if(isset($_POST['exercise_registration'])){
        $func->createExercise($_POST);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Exercise</title>
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
                    <li class="item"><a href="#">Exercise Section</a></li>
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
            <!-- -----------------Add Exercise Type ---------------- -->
            <!-- Add PHP to insert informations -->
            <div class="form__section">
                <h2>Add Exercise Type</h2>
                <form method="post">
                    <div class="input">
                        <label for="add_exercise_type">Add Exercise Type</label>
                        <input type="text" name="add_exercise_type">
                    </div>
                    <div class="button">
                        <input type="hidden" name="add_exercise_type_registration">
                        <button type="submit">Add Exercise Type</button>
                    </div>
                </form>
            </div>
            <!-- Add PHP to show exercises type details -->
            <div class="list__section">
                <h2>Exercise Type</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php
                            $list = $func->listExerciseType();
                            if($list):
                                foreach($list as $item):
                        ?>
                            <h3><?= $item['exercise_type'] ?></h3>
                            <div class="edit__button">
                                <button type="submit">Edit</button>
                            </div>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    
                </div>
            </div>
            <!-- ------------------Add Equipment-------------- -->
            <!-- Add PHP to insert informations -->
            <div class="form__section">
                <h2>Add Equipment</h2>
                <form method="post">
                    <div class="input">
                        <label for="equipment_name">Add Equipment Name</label>
                        <input type="text" name="equipment_name">
                    </div>
                    <div class="textarea">
                        <label for="equipment_description">Add Equipment Description</label>
                        <textarea name="equipment_description"></textarea>
                    </div>
                    <div class="button">
                        <input type="hidden" name="equipment_registration">
                        <button type="submit">Add Equipment</button>
                    </div>
                </form>
            </div>
            <!-- --------------List of Equipment------------ -->
            <div class="list__section">
                <h2>Equipments</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Equipment name</h3>
                        <p>Equipment's description</p>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Equipment name</h3>
                        <p>Equipment's description</p>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Equipment name</h3>
                        <p>Equipment's description</p>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Equipment name</h3>
                        <p>Equipment's description</p>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------------------Add Exercise----------------- -->
            <div class="form__section">
                <h2>Add Exercise</h2>
                <form method="post">
                    <div class="input">
                        <label for="exercise_name">Exercise Name</label>
                        <input type="text" name="exercise_name">
                    </div>
                    <div class="select">
                        <label for="exercise_type">Select Exercise Type</label>
                        <select name="exercise_type">
                            <!-- Select exercise from database -->
                            <option value="">Select Exercise Type</option>
                            <option value="">Crossfit</option>
                            <option value="">Functional</option>
                            <option value="">Weightlifting</option>
                        </select>
                    </div>
                    <div class="textarea">
                        <label for="exercise_description">Exercise Description</label>
                        <textarea name="exercise_description"></textarea>
                    </div>
                    <div class="select">
                        <label for="equipment_type">Select Exercise Type</label>
                        <!-- Select equipment from database -->
                        <select name="equipment_type">
                            <option value="">Select Equipment Type</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="button">
                        <input type="hidden" name="exercise_registration">
                        <button type="submit">Add Exercise</button>
                    </div>

                </form>
            </div>
            <!-- --------------List Exercises-------------- -->
            <div class="list__section">
                <h2>Exercises</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Exercise name</h3>
                        <h4>Exercise Type</h4>
                        <h4>Equipment name</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Exercise name</h3>
                        <h4>Exercise Type</h4>
                        <h4>Equipment name</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Exercise name</h3>
                        <h4>Exercise Type</h4>
                        <h4>Equipment name</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Exercise name</h3>
                        <h4>Exercise Type</h4>
                        <h4>Equipment name</h4>
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