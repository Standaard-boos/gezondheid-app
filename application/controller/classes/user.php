<?php

class User
{
    protected $email, $userPass;

    public $loginError;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login()
    {
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        $token = $_SESSION['token'];
        
        if (!empty($_POST['token'])) {
            if (hash_equals($_SESSION['token'], $_POST['token'])) {
                if(isset($_POST['submit'])){
                    $this->email = $this->db->connection->real_escape_string($_POST['email']) ?? 'not defined';
                    $this->userPass = $_POST['password'] ?? 'not defined';
                    $sql = "SELECT `email`,`password` FROM user WHERE email = ?";

                    if($stmt = $this->db->connection->prepare($sql)){
                        $stmt-> bind_param("s", $this->email);
                        $stmt->bind_result($dbname,$dbpass);
                        if($stmt->execute()){
                        $stmt->store_result();
                            if($stmt->num_rows == 1) {
                                $stmt->fetch();
                                //  De user bestaat nu wachtwoord controle
                                $login = password_verify($this->userPass, $dbpass);
                                if ($login) {
                                    $this->loginError = "";

                                    $user_info = $this->db->query('SELECT user.ID, user.username, user.email,user.geboortedatum, user.height, user.gender, weight.weights 
                                                                    FROM user INNER JOIN weight ON weight.ID WHERE user.email = ? LIMIT 1', $this->email)->fetchArray();
                                    
                                    
                                    $_SESSION['user_id'] = $user_info['ID'];
                                    $_SESSION['user_name'] = $user_info['username'];
                                    $_SESSION['user_email'] = $user_info['email'];
                                    $_SESSION['user_weight'] = $user_info['weights'];
                                    $_SESSION['user_age'] = $user_info['geboortedatum'];
                                    $_SESSION['height'] = $user_info['height'];
                                    $_SESSION['gender'] = $user_info['gender'];
                                    $_SESSION['loggedin'] = $login;
                                    $_SESSION['email'] = $this->email;
                                    $_SESSION['session_id'] = session_id();
                                    $_session['valid'] = true;


                                    echo "<script type='text/javascript'>window.location.href = \"/dash\";</script>";
                                    return true;
                                }
                                else{
                                    $_SESSION['loginError'] = 'Email of Wachtwoord is onjuist!';

                                    $this->loginError = "Email of wachtwoord is onjuist!";
                                }   
                            }
                            else{
                                $_SESSION['loginError'] = 'Email of Wachtwoord is onjuist!';


                                $this->loginError = "Email of wachtwoord is onjuist!";
                            }
                        }
                    }
                } else
                {
                    $_SESSION['loginError'] = 'Email of Wachtwoord is onjuist!';

                    $this->loginError = "Email of wachtwoord is onjuist!";
                }
            } else {
                echo "kan niet";
            }
        }
    }

    public function logedIn()
    {
        if (isset($_SESSION['loggedin']))
        {
            echo "<script type='text/javascript'>window.location.href = \"/dash\";</script>";
        }
    }
}
