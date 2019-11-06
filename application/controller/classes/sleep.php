<?php 

class Sleep
{
    protected $sleep;
    protected $sleep_date;
    function __construct($db){
        $this->db = $db;
        $this->addToSleepTable();
    }

    function addToSleepTable()
    {
        if(isset($_POST['submit']))
        {
            $timestamp = date('Y-m-d');
            $this->sleep = $this->db->connection->real_escape_string($_POST['sleep']) ?? 'not defined';
            $this->sleep_date = $this->db->connection->real_escape_string($_POST['sleep_date']) ?? 'not defined';
            $date = new DateTime($this->sleep_date);
            $check= $this->db->query('SELECT * FROM sleep WHERE hour_sleep = ?',$this->sleep)->fetchArray();
            $checkDate= $this->db->query('SELECT * FROM user_sleep WHERE user_id = ?',$_SESSION['user_id'])->fetchArray();

            if($this->sleep > 0 && $this->sleep <= 24 && $this->sleep_date <=  $timestamp)
            {
                if($checkDate['sleep_date'] == $this->sleep_date)
                {
                    if(count($check) > 0 )
                    { 
                        $stmk = $this->db->connection->prepare('UPDATE `user_sleep` SET `sleep_id`= ? 
                        WHERE user_id = ? AND sleep_date = DATE(?)');
                        $stmk->bind_param('iis', $check['id'],$_SESSION['user_id'],$this->sleep_date);                
                        $stmk->execute();
                        $stmk->close();
                        $_SESSION['success'] = 'Uw aantal uren is gewijzigd voor ' . $this->sleep_date;                           
                    }else
                    {
                        $stmt = $this->db->connection->prepare('INSERT INTO sleep (hour_sleep) VALUES (?)');
                        $stmt->bind_param('s',$this->sleep);            
                        $stmt->execute();
                        $lastInsertId = $stmt->insert_id;
                        $stmt->close();

                        $stmk = $this->db->connection->prepare('UPDATE `user_sleep` SET `sleep_id`= ? 
                        WHERE user_id = ? AND sleep_date = DATE(?)');
                        $stmk->bind_param('iis', $lastInsertId,$_SESSION['user_id'],$this->sleep_date);                
                        $stmk->execute();
                        $stmk->close();
                        $_SESSION['success'] = 'Uw aantal uren is gewijzigd voor ' . $this->sleep_date;                           
                    }
                }
                else
                {
                    if(count($check) > 0 )
                    {
                        $stmk = $this->db->connection->prepare('INSERT INTO user_sleep (user_id,sleep_id,sleep_date) VALUES (?,?,?)');
                        $stmk->bind_param('iis', $_SESSION['user_id'],$check['id'],$this->sleep_date);                
                        $stmk->execute();
                        $stmk->close();
                        $_SESSION['success'] = 'Aantal slaapuren is toegevoegd';                
                    }
                    else
                    {
                        $stmt = $this->db->connection->prepare('INSERT INTO sleep (hour_sleep) VALUES (?)');
                        $stmt->bind_param('s',$this->sleep);            
                        $stmt->execute();
                        $lastInsertId = $stmt->insert_id;
                        $stmt->close();
                        
                        // add sleep id to the user_sleep table
                        $stm = $this->db->connection->prepare('INSERT INTO user_sleep (user_id,sleep_id,sleep_date) VALUES (?,?,?)');
                        $stm->bind_param('iis', $_SESSION['user_id'],$lastInsertId,$this->sleep_date);
                        $stm->execute();
                        $stm->close();
                        $_SESSION['success'] = 'Aantal slaapuren is toegevoegd';                
                    }   
                }
            }else
            {
                $_SESSION['failed'] = 'Er is iets fout gegaan';                                
            }
        }
    }
}