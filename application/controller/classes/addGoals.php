<?php 

    class AddGoals{

        protected   $task,
                    $task_quantity,
                    $goal_quantity,
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
                $this->goal_quantity = $this->db->connection->real_escape_string($_POST['goal_quantity']) ?? 'not defined';

                $stmtCheck = $this->db->connection->prepare('SELECT `id` FROM goals WHERE task = ?');
                $stmtCheck->bind_param('s',$this->task);
                $stmtCheck->bind_result($id);
                $stmtCheck->execute();

                //check if goal already exists 
                if($stmtCheck->fetch() > 0){
                    $stmtCheck->close();
                    // insert in user_goals table
                    $this->db->query('INSERT INTO user_goals (user_id,goal_waarden,task_quantity,user_progress,goals_id, display)
                    VALUES (?,?,?,0,?,?)',$this->user_id,$this->goal_quantity,$this->task_quantity,$id, 1);
                    $_SESSION['addgoalsuccess'] = 'Doel toegevoegd!';
                }else{
                    //insert in goals table
                    $stmt = $this->db->connection->prepare('INSERT INTO goals (task)
                        VALUES(?);');
                    $stmt->bind_param('s', $this->task);
                    $stmt->execute();
                    $last_id = $this->db->connection->insert_id;
                    // // insert in user_goals table
                    $this->db->query('INSERT INTO user_goals (user_id,goal_waarden,task_quantity,user_progress,goals_id, display)
                        VALUES (?,?,?,0,?,?)',$this->user_id,$this->goal_quantity,$this->task_quantity,$last_id, 1);

                    $_SESSION['addgoalsuccess'] = 'Doel toegevoegd!';

                    $stmt->close();
                }     
            }
        }
               
    }