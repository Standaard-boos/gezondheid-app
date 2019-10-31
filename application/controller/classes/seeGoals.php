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
                $stmt = $this->db->connection->prepare('UPDATE user_goals SET user_progress = ? WHERE id = ?');
                var_dump($data);
                $stmt->bind_param('ii',$data,$id);            
                $stmt->execute();
                $stmt->close();
                $_SESSION['goalupdated'] = 'Doel geupdate!';
            }
        }

        public function deleteGoal(){
            $id = $_POST['id'];
            if(!empty($id)){
                $stmt = $this->db->connection->prepare('UPDATE user_goals SET display = 0 WHERE id = ?');
                $stmt->bind_param('i',$id);            
                $stmt->execute();
                $stmt->close();
                $_SESSION['goaldeleted'] = 'Doel verwijderd!';
            }
        }

        public function SeeGoal(){
            $bool = true;
            $goal = $this->db->query('SELECT UG.ID, G.task, G.sets, UG.task_quantity, UG.user_progress, UG.user_id, UG.display FROM goals AS G
            INNER JOIN user_goals as UG ON G.id = UG.goals_id
            WHERE UG.user_id = ? ORDER BY UG.date DESC', $this->user_id)->fetchAll();
            foreach($goal as $row){
                if ($row["task_quantity"] <= $row['user_progress']) {
                    $achieved = '<input class="input goal" type="number" style="border-color: green; text-align: center" readonly min="0" name="goal" 
                                placeholder="Uw doel is behaald!"></div>\'';
                }
                else{
                    if ($row['user_progress'] !== 0 ) {
                        $progress =  $row['user_progress'];
                        $title = $row['sets'];
                    } else {
                        $progress = "";
                        $title = "";
                    }
                    $achieved = '<input class="input goal" type="number" style="text-align: center" value="'. $progress .'" min="0" name="goal" 
                                placeholder="Wat is uw progressie?"></div>';
                }
                if($row['display']){
                    $bool = false;
                    $html = '<div class="input-blocks" task-id='.$row["ID"].'>
                            <div class="input-icon">
                                <h2 class="sub-title">'.$row["task"] .'</h2>
                            </div>
                            <div class="input-icon">
                                <i class="far fa-clock icon"></i>
                                <div class="input">'.$row["task_quantity"] .' '. $row['sets'] .'</div>
                            </div>
                            <div class="input-icon">
                                <span class="icon-right">'. $title .'</span>
                                '. @$achieved .'
                                <a href="../seegoal" class="button updateGoalBtn">Update doel</a>
                                <br>
                                <br>
                                <br>
                                <a href="../seegoal" class="button deleteGoalBtn">Verwijder doel</a>
                                <br>
                                <br>
                            </div>';
                        echo $html;
                }
            }
            if($bool == true){
                echo  'Geen doelen gevonden.';
            }
            // buttons for adding a goal
            echo '';
        }
}     
?>
