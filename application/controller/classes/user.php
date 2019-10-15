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
        if (isset($_POST['submit']))
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
                                        $sql_user_id = $this->db->query('SELECT `ID` FROM user WHERE email = ? LIMIT 1',$this->email)->fetchArray();

                                        $_SESSION['user_id'] = $sql_user_id;
                                        $_SESSION['loggedin'] = $login;
                                        $_SESSION['email'] = $this->email;
                                        $_SESSION['session_id'] = session_id();


                                        echo "<script type='text/javascript'>window.location.href = \"/dash\";</script>";
                                        return true;
                                    }
                                    else{
                                        $this->loginError = "Email of wachtwoord is onjuist!";
                                    }   
                                }
                                else{
                                    $this->loginError = "Email of wachtwoord is onjuist!";
                                }
                            }
                        }
                    } else
                    {
                        $this->loginError = "Email of wachtwoord is onjuist!";
                    }
                } else {
                    echo "kan niet";
                }
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
