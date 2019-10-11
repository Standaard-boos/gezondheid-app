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


        public static function updateDoel(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                echo 'het werkt';
                $updateDoel = json_decode($_POST['doel']) or $_REQUEST['doel'];
                json_decode($updateDoel);
                echo $updateDoel;
            }
           
            // $this->db->query('UPDATE goals
            // SET user_doelen = ?,
            // WHERE id = ?');
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
                                '<input class="input goal" type="text" name="goal" placeholder="Hoeveel heeft u gehaald van uw doel">',
                            '</div>',
                                '<button class="button" type="button" onclick="updateDoel()" name="updateDoel2">Update doel</button>',
                                '<button class="button" name="DeleteDoel">Verwijder doel</button>',
                        '</div>';
                }

            if(empty($goal)){
                echo  'Geen doelen gevonden.';
            }
        }
}     
?>
<!-- 

    this.updateDoel()

function updateDoel(){
    let updateDoel =  document.getElementById('goal').innerText

    (async () => {
        const rawResponse = await fetch('http://gezondheidmeter.test/ajax', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(updateDoel)
        });
        const content = await rawResponse.json();
      
        console.log(content);
      })();
} -->