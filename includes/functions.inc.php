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

        header('location: ../dashboard/dashboard_exercise.html');
    }


    // Create a list function to show name of coach and class type from database.
}