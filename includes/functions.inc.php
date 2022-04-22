<?php 
    require('model.php');

    class allFunctions extends model {

    protected $pdo;

    public function __construct() {
        return parent::__construct();
    }

    // Password Verify
    public function password_verify($password_user, $password_db){
        $pwd = md5($password_user);
        if($pwd == $password_db){
            return true;
        } 
        return false;
    }

    // Create User Function
    public function createUser(array $data) {
        
        $username = $data['username'];
        $password = md5($data['password']);
        $first_name = $data['first_name'];
        $last_name  = $data['last_name'];
        $email  = $data['email'];
        $account_type = $data['account_type'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_user` (username, password, firstname, lastname, email, account_type)
                                    VALUES(:username, :password, :firstname, :lastname, :email, :account_type);");

        $sql->bindParam(':username', $username);
        $sql->bindParam(':password', $password);
        $sql->bindParam(':firstname', $first_name);
        $sql->bindParam(':lastname', $last_name);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':account_type', $account_type);
        $sql->execute();

        header("location: ../dashboard/dashboard_user.php");
    }

    // List of Users
    public function listUser(){
        $sql = $this->pdo->prepare("SELECT * FROM `tb_user`");
        $sql->execute();
        
        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql ->fetchAll();
        }

        return $result;
    }

    // Create Class Type
    public function createClassType(array $data){
        $class_type = $data['add_class_type'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_class_type`  (class_type) VALUES(:class_type);");

        $sql->bindParam(':class_type', $class_type);
        $sql->execute();
        header("location: ../dashboard/dashboard_class.php");

    }

    // List of Class Type
    public function listClassType(){
        $sql = $this->pdo->prepare("SELECT * FROM `tb_class_type`");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }

    // Create Class
    // Create function to list coach and make the values be from database
    public function createClass(array $data){
        
        $class_type = $data['class_type'];
        $select_coach = $data['select_coach'];
        $class_time = $data['class_time'];
        $class_day = $data['class_day'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_class` (class_type_id, select_coach_id, class_time, class_day) 
                                    VALUES(:class_type_id, :select_coach_id, :class_time, :class_day);");

        $sql->bindParam(':class_type_id', $class_type);
        $sql->bindParam(':select_coach_id', $select_coach);
        $sql->bindParam(':class_time', $class_time);
        $sql->bindParam(':class_day', $class_day);
        $sql->execute();

        header('location: ../dashboard/dashboard_exercise.php');
    }


    // Create a list function to show name of coach and class type from database.


    // Create Exercise Type
    public function createExerciseType(array $data){

        $add_exercise_type = $data['add_exercise_type'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_exercise_type` (exercise_type) 
                                    VALUES(:exercise_type);");
        $sql->bindParam(':exercise_type', $add_exercise_type);
        $sql->execute();

        header('location: ../dashboard/dashboard_user.php');
    }

    // List of exercise type
    public function listExerciseType(){
        $sql = $this->pdo->prepare("SELECT * FROM `tb_exercise_type`");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }

    // Create Exercise function
    public function createEquipment(array $data){
        $equipment_name = $data['equipment_name'];
        $equipment_description = $data['equipment_description'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_equipment` (equipment_name, equipment_description) 
                                    VALUES (:equipment_name, :equipment_description);");
        
        $sql->bindParam(':equipment_name', $equipment_name);
        $sql->bindParam(':equipment_description', $equipment_description);
        $sql->execute();

        header('location: ../dashboard/dashboard_user.php');
    }
    // list of equipment
    public function listEquipment(){
        $sql = $this->pdo->prepare("SELECT * FROM `tb_equipment`");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }

    // Create Exercise
    public function createExercise(array $data){
        $exercise_name = $data['exercise_name'];
        $exercise_type = $data['exercise_type'];
        $exercise_description = $data['exercise_description'];
        $equipment_type = $data['equipment_type'];
       
        $sql = $this->pdo->prepare("INSERT INTO `tb_exercise` (exercise_name, tb_exercise_type_id, exercise_description, tb_equipment_id)
                                    VALUES (:exercise_name, :tb_exercise_type_id, :exercise_description, :tb_equipment_id);");
        $sql->bindParam(':exercise_name', $exercise_name);
        $sql->bindParam(':tb_exercise_type_id', $exercise_type);
        $sql->bindParam(':exercise_description', $exercise_description);
        $sql->bindParam(':tb_equipment_id', $equipment_type);
        $sql->execute();

        header("location: ../dashboard/dashboard_exercise.php");
    }
    // Here it's list exercise
    // I used INNER JOIN to link 3 different tables into this section
    public function listExercise(){
        $sql = $this->pdo->prepare("SELECT e.exercise_name , et.exercise_type, e.exercise_description, ep.equipment_name
                                    FROM tb_exercise AS e INNER JOIN tb_exercise_type AS et
                                    ON e.tb_exercise_type_id = et.id
                                    INNER JOIN tb_equipment AS ep
                                    ON e.tb_equipment_id = ep.id"
                                    );
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }
    // Select Exercise to Create Workout
    public function selectExercise(){
        $sql = $this->pdo->prepare("SELECT * FROM `tb_exercise`");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }
    // Create Workout
    public function createWorkout(array $data){
        $workout_name = $data['workout_name'];
        $workout_description = $data['workout_description'];
        $reps = $data['reps'];
        $select_exercise = $data['select_exercise'];
        $workout_time = $data['workout_time'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_workout` (workout_name, workout_description, reps, tb_exercise_id, time) 
                                    VALUES (:workout_name, :workout_description, :reps, :tb_exercise_id, :time);");

        $sql->bindParam(':workout_name', $workout_name);
        $sql->bindParam(':workout_description', $workout_description);
        $sql->bindParam(':reps', $reps);
        $sql->bindParam(':tb_exercise_id', $select_exercise);
        $sql->bindParam(':time', $workout_time);
        $sql->execute();
        
        header('location: ../dashboard/dashboard_user.php');
    }
    // List Workout
    public function listWorkout(){
        $sql = $this->pdo->prepare("SELECT w.workout_name, w.workout_description, w.reps, e.exercise_name, w.time
                                    FROM tb_workout AS w INNER JOIN tb_exercise AS e
                                    ON w.tb_exercise_id = e.id
                                    ");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }
        return $result;
    }
    public function selectWorkout(){
        $sql = $this->pdo->prepare("SELECT * FROM `tb_workout`");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }
    public function selectMember(){
        $sql = $this->pdo->prepare("SELECT * FROM `tb_user`
                                    WHERE account_type='member'");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }
    // It's missing function to link workout with Member
    public function linkWorkoutToMember(array $data){
        $select_workout = $data['select_workout'];
        $select_user = $data['select_user'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_workout_to_user` (tb_workout_id, tb_user_id)
                                    VALUES(:tb_workout_id, :tb_user_id);");
        
        $sql->bindParam(':tb_workout_id', $select_workout);
        $sql->bindParam(':tb_user_id', $select_user);
        $sql->execute();

        header('location: ../dashboard/dashboard_user.php');
    }
    public function listMemberWithWorkout(){
        $sql = $this->pdo->prepare("SELECT w.workout_name, u.username, u.lastname
                                    FROM tb_workout_to_user AS wu 
                                    INNER JOIN tb_workout as w
                                    ON wu.tb_workout_id = w.id
                                    INNER JOIN tb_user as u
                                    ON wu.tb_user_id = u.id
                                    ");
        $sql->execute();

        $result = array();
        if($sql->rowCount() > 0){
            $result = $sql->fetchAll();
        }

        return $result;
    }
}