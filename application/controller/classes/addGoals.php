<?php 

    class AddGoals{

        protected   $task,
                    $task_quantity,
                    $user_id;

        public function __construct($db){
            $this->db = $db;
            $this->user_id = $_SESSION['user_id'];

            if(!isset($_SESSION['loggedin'])){
                header("Location:/");
            }
        }
        
        public function addGoal(){
            $true = 1;
            if(isset($_POST['submit'])){
                $this->task = $this->db->connection->real_escape_string(strtolower($_POST['task'])) ?? 'not defined';
                $this->task_quantity = $this->db->connection->real_escape_string($_POST['task_quantity']) ?? 'not defined';

                $stmtCheck = $this->db->connection->prepare('SELECT id,task, sets  FROM goals WHERE id = ? ');
                $stmtCheck->bind_param('s',$this->task);
                $stmtCheck->bind_result($id, $goalname, $sets);
                $stmtCheck->execute();

                $stmtCheck->fetch();
                $timestamp = date('Y-m-d H:i:s');
                //check if goal already exists
                if($stmtCheck->fetch() > 0){
                    $stmtCheck->close();
                    // insert in user_goals table
                    $this->db->query('INSERT INTO user_goals (user_id, date, task_quantity,user_progress,goals_id, display)
                        VALUES (?,?,?,?,?,?)',$this->user_id, $timestamp,  $this->task_quantity, 0, $this->task, 1);
                    $_SESSION['addgoalsuccess'] = 'Doel toegevoegd!';
                }else{
                    // // insert in user_goals table
                    $this->db->query('INSERT INTO user_goals (user_id, date, task_quantity,user_progress,goals_id, display)
                        VALUES (?,?,?,?,?,?)',$this->user_id, $timestamp,  $this->task_quantity, 0, $this->task, 1);

                    $_SESSION['addgoalsuccess'] = 'Doel toegevoegd!';

//                    $stmt->close();
                }
            }
        }
               
    }