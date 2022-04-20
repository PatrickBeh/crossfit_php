<?php 
    require('model.php');

    class allFunctions extends model {

    protected $pdo;

    public function __construct() {
        return parent::__construct();
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
    // Here will be list exercise
    public function listExercise(){
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
        $select_exercise = $data['select_exercise'];
        $workout_time = $data['workout_time'];
        $workout_set_and_reps = $data['workout_set_and_reps'];

        $sql = $this->pdo->prepare("INSERT INTO `tb_workout` (workout_name, workout_description, tb_exercise_id, time, set_and_reps) 
                                    VALUES (:workout_name, :workout_description, :tb_exercise_id, :time, :set_and_reps);");

        $sql->bindParam(':workout_name', $workout_name);
        $sql->bindParam(':workout_description', $workout_description);
        $sql->bindParam(':tb_exercise_id', $select_exercise);
        $sql->bindParam(':time', $workout_time);
        $sql->bindParam(':set_and_reps', $workout_set_and_reps);
        $sql->execute();
        
        header('location: ../dashboard/dashboard_user.php');
    }
    // It's missing function list workout
    // It's missing function to link workout with class
}