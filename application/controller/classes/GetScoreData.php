<?php



    class GetScoreData
    {
        public function __construct($db)
        {
            $this->db = $db;

        }
        public function GetScoreWork(){

            $Conn = new Connection();

            $score = $this->db->query('SELECT werktotalscore FROM user_werkscore 
                    WHERE user_id = ?
                    ORDER by date DESC LIMIT 1 ', $_SESSION['user_id'])->fetchArray();

            $checkscore = $score['werktotalscore'];

            return $checkscore;

        }

        public function GetScoreAlcolhol(){
            $user = $_SESSION['user_id'];
            $score = $this->db->query('SELECT alcohol_type_id, quantity FROM alcohol WHERE user_id = ?', $user)->fetchAll();

            $total = 0;
            foreach ($score as $key => $value)
            {
                if (is_array($value))
                {
                    $total += $value['quantity'];
                }
            }

            return $total;
        }

    }