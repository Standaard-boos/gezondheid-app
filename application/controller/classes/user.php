<?php 
    
    class User 
    {
        private $email,
                $userPass;

        public function __construct($db)
        {
            $this->db = $db; 
            
        }
        public function login()
        {
            $this->email = $this->db->connection->real_escape_string($_POST['email']);
            $this->userPass = $_POST['password'];
            $sql = "SELECT `email`,`password` FROM user WHERE email = ?";

            if($stmt = $this->db->connection->prepare($sql)){
                $stmt-> bind_param("s", $this->email);
                $stmt->bind_result($dbname,$dbpass);
                if($stmt->execute()){
                $stmt->store_result();
                    if($stmt->num_rows == 1) {
                        echo $this->email . "<br>" . $this->userPass;
                        $stmt->fetch();
                        //  De user bestaat nu wachtwoord controle
                        $login = password_verify($this->userPass, $dbpass);
                        if ($login) {
                            $_SESSION['loggedin'] = $login;
                            $_SESSION['email'] = $this->email;
                            $_SESSION['session_id'] = session_id();
                            header('location: /dash');
                            return true;
                        }
                    else {
                            echo "not loged in";
                        }
                    }
                }
            }
        }
        public function getDrinks()
        {
            $account = $this->db->query('SELECT * FROM drinks')->fetchArray();
        }
        public function logedIn(){
            if(isset($_SESSION['loggedin'])){
                header("Location:/dash");
            }
        }
    }