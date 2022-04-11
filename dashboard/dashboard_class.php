<?php
    require('../includes/functions.inc.php');
    require('../includes/db_link.inc.php');
    $pdo;
    $func = new allFunctions();  

    // Here is php for create class type by add_class_type_registration
    if(isset($_POST['add_class_type_registration'])){
        $func->createClassType($_POST);
    }
    if(isset($_POST['add_class_registration'])){
        $func->createClass($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Class</title>
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
                    <li class="item"><a href="#">Class Section</a></li>
                    <li class="item"><a href="dashboard_exercise.html">Exercise Section</a></li>
                    <li class="item"><a href="dashboard_workout">Workout Section</a></li>
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
            <!-- ----------------------Add Class Section----------------- -->
                <!-- --------------Add Class Type Section------------ -->
            <div class="form__section">
                <h2>Add Class Type</h2>
                <form method="post">
                    <div class="input">
                        <label for="add_class_type">Add Class Type</label>
                        <input type="text" name="add_class_type">
                    </div>
                    <div class="button">
                        <input type="hidden" name="add_class_type_registration">
                        <button type="submit">Add Class Type</button>
                    </div>
                </form>
            </div>
            <!-- ----------------- List Class Type -------  -->
            <!-- ADD PHP To show CLass type -->
            <div class="list__section">
                <h2>Classes Type</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php 
                            $list = $func->listClassType();
                            if($list):
                                foreach($list as $item):
                                    
                        ?>
                        <h3><?= $item['class_type'] ?></h3>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <!-- --------------------Add CLass------------------------ -->
            <div class="form__section">
                <h2>Add Class</h2>
                <form method="post">
                    <div class="select">
                        <label for="class_type">Select Class Type</label>
                        <select name="class_type">
                            <!-- Add PHP to select options from database -->
                            <option value="">Select Class Type</option>
                            <option value="1">Crossfit</option>
                            <option value="2">Weightlifting</option>
                            <option value="3">Functional</option>
                        </select>
                    </div>   
                    <div class="select">
                        <label for="select_coach">Select Coach For This Class</label>
                        <select name="select_coach">
                            <!-- Add PHP To select options from database -->
                            <option value="#">Select Coach</option>
                            <option value="1">Patrick Behenck</option>
                            <option value="2">Erick Cordeiro</option>
                            <option value="3">Helio Thomaz</option>
                        </select>
                    </div>                 
                    <div class="input">
                        <label for="class_time">Specify Class Time</label>
                        <input type="time" name="class_time">
                   </div>
                    <div class="input">
                        <label for="class_day">Type Day In The Week</label>
                        <input type="text" name="class_day">
                    </div>
                    <div class="button">
                        <input type="hidden" name="add_class_registration">
                        <button type="submit">Add Class</button>
                    </div>
                </form>
            </div>
            <!-- --------------List Class------------------ -->
            <!-- ADD PHP TO SELECT CLASSES AT THE DATABASE AND SELECT FROM EACH DAY -->
           
            <!-- ----------------Classes On Monday---------------- -->
            <div class="list__section">
                <h2>Classes on Monday</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------------CLasses On Tuesday------------------- -->
            <div class="list__section">
                <h2>Classes on Tuesday</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------------Classes on Wednesday -------------- -->
            <div class="list__section">
                <h2>Classes on Wednesday</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------------Class on Thursday ---------------- -->
            <div class="list__section">
                <h2>Classes on Thursday</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------------Class on Friday---------------- -->
            <div class="list__section">
                <h2>Classes on Friday</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------------Classes on Saturday---------------- -->
            <div class="list__section">
                <h2>Classes on Saturday</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
                        <div class="edit__button">
                            <button type="submit">Edit</button>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Name of the class</h3>
                        <h3>Name of the Coach</h3>
                        <h4>Time of the class</h4>
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