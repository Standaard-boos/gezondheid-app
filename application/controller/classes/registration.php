<?php
require_once('user.php');

class registration
{
    protected $username;
    protected $password;
    protected $passwordVerify;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register()
    {
        if (isset($_POST['submit']))
        {
            $username = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $verifyPassword = htmlspecialchars($_POST[ 'verifyPassword']);
            $heightUser = htmlspecialchars($_POST['height']);
            $weightUser = htmlspecialchars($_POST['weight']);
            $ageUser = htmlspecialchars($_POST['geboortedatum']);
            $genderUser = htmlspecialchars($_POST['gender']);
            $rook = htmlspecialchars($_POST['roker']);
            $drugs = htmlspecialchars($_POST['drugs']);
            $movement = htmlspecialchars($_POST['movement']);

            $error = 0;

            if ($password === $verifyPassword)
            {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            } else
            {
                $error = 1;
                echo 'Wachtwoorden zijn niet gelijk!';
            }

            if ($error === 0)
            {
                $this->db->query('INSERT INTO user (username, password, email, geboortedatum, height, gender, roker, drugs, movement)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)', $username, $hashed_password, $email, $ageUser, $heightUser,
                                 $genderUser, $rook, $drugs, $movement);

                $account = $this->db->query('SELECT ID FROM user WHERE username = ? AND email = ?', $username, $email)->fetchArray();
                $UserID = $account['ID'];

                $this->db->query('INSERT INTO weight (user_id, weights)
                                VALUES (?, ?)', $UserID, $weightUser);
                $_SESSION['registered'] = 'Uw bent geregistreerd!';
            }
        }
    }
}
