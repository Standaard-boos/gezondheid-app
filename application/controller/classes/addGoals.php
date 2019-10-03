<?php 

    class AddGoals{

        protected   $task,
                    $task_quantity;

        public function __construct($db){
            $this->db = $db;
        }

        public function addGoal(){
            
            if(isset($_POST['submit'])){
                $this->task = $this->db->connection->real_escape_string($_POST['task']) ?? 'not defined';
                $this->task_quantity = $this->db->connection->real_escape_string($_POST['task_quantity']) ?? 'not defined';

                $this->db->query('INSERT INTO goals (task,task_quantity)
                    VALUES (?,?)', $this->task, $this->task_quantity);
            }
        }
    }