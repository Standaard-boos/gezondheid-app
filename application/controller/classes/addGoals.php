<?php 

    class AddGoals{

        protected   $task,
                    $task_quantity,
                    $user_id;

        public function __construct($db){
            $this->db = $db;
            $this->user_id = implode('', $_SESSION['user_id']);
            
            if(!isset($_SESSION['loggedin'])){
                header("Location:/");
            }
        }

        public function addGoal(){
            
            if(isset($_POST['submit'])){
                $this->task = $this->db->connection->real_escape_string($_POST['task']) ?? 'not defined';
                $this->task_quantity = $this->db->connection->real_escape_string($_POST['task_quantity']) ?? 'not defined';
                $this->db->query('INSERT INTO user_goals (ID,user_id,goals_id,date,task_quantity)
                    VALUES (?,?,?,?,?)', $this->task_quantity);
                $this->db->query('INSERT INTO goals (id,task)
                    VALUES (?,?)',$this->task);
            }
        }
    }