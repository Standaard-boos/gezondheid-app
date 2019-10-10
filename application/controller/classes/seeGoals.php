<?php
// Add the user ID and get the ID

class SeeGoals{

    protected   $user_id;

        public function __construct($db){
            $this->db = $db;
            $this->user_id = implode('', $_SESSION['user_id']);
            
            if(!isset($_SESSION['loggedin'])){
                header("Location:/");
            }
        }

        public function SeeGoal(){
            // Fetch all for multiple
            // FetchArray for single
            $goal = $this->db->query('SELECT user_goals.goals_id, goals.task, user_goals.task_quantity 
            FROM user_goals
            INNER JOIN goals
            ON user_goals.goals_id = goals.id
            WHERE user_goals.user_id = ?', $this->user_id)->fetchAll();

                    foreach($goal as $row){
                        echo '<div class="input-blocks">',
                                '<div class="input-icon"> ',
                                    '<div class="title">'.$row["task"],
                                    '</div>',
                                '</div>',
                                '<div class="input-icon">',
                                    '<i class="far fa-clock icon"></i>',
                                    '<div class="input">'.$row["task_quantity"],
                                    '</div>',
                                '</div>',
                                '<div class="input-icon">',
                                    '<i class="far fa-clock icon"></i>',
                                    '<input class="input" type="text" name="goal" placeholder="Doel">',
                                '</div>',
                                    '<button class="button" name="UpdateDoel" type="submit">Update doel</button>',
                                    '<button class="button" name="DeleteDoel" type="submit">Verwijder doel</button>',
                            '</div>';
                    }

                    if(empty($goal)){
                        echo  'Geen doelen gevonden.';
                    }
        }
}     
?>