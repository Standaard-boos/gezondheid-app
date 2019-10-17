<?php
// Add the user ID and get the ID

class SeeGoals{


    protected   $user_id;

        public function __construct($db){
            $this->db = $db;
            $this->user_id = $_SESSION['user_id'];
            
            if(!isset($_SESSION['loggedin'])){
                header("Location:/");
            }
        }

        public function updateDoel(){
            $id = $_POST['id'];
            $data = $_POST['data'];
            if (!empty($id) || empty($data)) {
                $stmt = $this->db->connection->prepare('UPDATE goals SET user_doelen = ? WHERE id = ?');
                $stmt->bind_param('ii',$data,$id);            
                $stmt->execute();
                $stmt->close();
                $message = array();
                $message[0] = "Gebruikers doelen is gewijzigd";
                echo json_encode($message);
            }
        }

        public function deleteGoal(){
            $id = $_POST['id'];
            if(!empty($id)){
                $stmt = $this->db->connection->prepare('UPDATE goals SET display = 0 WHERE id = ?');
                $stmt->bind_param('i',$id);            
                $stmt->execute();
                $stmt->close();
                $message = array();
                $message[0] = "Gebruikers doelen is verwijderd";
                echo json_encode($message);
            }
        }

        public function SeeGoal(){
            $bool = false;
            $goal = $this->db->query('SELECT user_goals.goals_id, goals.task,goals.id,goals.user_doelen, user_goals.task_quantity, goals.display 
            FROM user_goals
            INNER JOIN goals
            ON user_goals.goals_id = goals.id
            WHERE user_goals.user_id = ? ORDER BY goals.id DESC
            ', $this->user_id)->fetchAll();
            foreach($goal as $row){
                if ($row["task_quantity"] <= $row['user_doelen']) {
                    $achieved = '<small>Uw doel is behaald</small>';
                }
                if($row['display']){
                    $bool = false;
                    $html = '<div class="input-blocks" task-id='.$row["id"].'>
                            <div class="input-icon">
                                <div class="title"> '.$row["task"] .
                                '</div>
                            </div>
                            <div class="input-icon">
                                <i class="far fa-clock icon"></i>
                                <div class="input">'.$row["task_quantity"] .
                                '</div>
                            </div>
                            <div class="input-icon">
                                <i class="far fa-clock icon"></i>
                                <input class="input goal" type="number" value="'. $row['user_doelen'] .'"\ min="0" name="goal" 
                                placeholder="Hoeveel heeft u gehaald van uw doel">
                                '. $achieved .'
                            </div>
                                <button class="button updateGoalBtn" type="button"  >Update doel</button>
                                <button class="button deleteGoalBtn" type="button">Verwijder doel</button>
                            </div>';
                        echo $html;
                }else{
                    $bool = true;
                }
            }
            if($bool){
                echo  'Geen doelen gevonden.';
            }
            // buttons for adding a goal
            echo '<div class="input-icon">
                        <div class="title" id="NoGoals"></div>
                    </div>
                    <div class="input-icon">
                        <a href="../addgoal" class="button">Voeg doel toe</a>
                    </div>
                    <div class="input-icon">
                        <a href="../dash" class="button">Terug</a>
                    </div>';
        }
}     
?>
