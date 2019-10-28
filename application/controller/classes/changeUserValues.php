<?php


class changeUserValues
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getValueUser()
    {
        if (empty($_SESSION['token']))
        {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        $token = $_SESSION['token'];

        if (!empty($_POST['token']))
        {
            if (hash_equals($_SESSION['token'], $_POST['token']))
            {
                if (isset($_POST['submit']))
                {
                    $error = 0;

                    $emailUser = htmlspecialchars($_POST['emailUser']);
                    $passwordUser = htmlspecialchars($_POST['userPassword']);
                    $newPasswordUser = htmlspecialchars($_POST['newPasswordUser']);

                    $user_info = $this->db->query('SELECT * FROM user WHERE ID = ?', $_SESSION['user_id'])->fetchArray();
                    $verifiedPassword = password_verify($passwordUser, $user_info['password']);
                    if ($passwordUser != $verifiedPassword)
                    {
                        $error = 1;
                        echo 'Uw huidige wachtwoord klopt niet' . '<br>';
                    }

                    if ($emailUser == '' || $passwordUser == '' || $newPasswordUser == '')
                    {
                        echo 'Velden mogen niet leeg';
                        exit();
                    }

                    if ($error === 0)
                    {
                        $hashed_password_new = password_hash($newPasswordUser, PASSWORD_DEFAULT);
                        $updateQuery = $this->db->query('UPDATE user SET email = ?, password = ? WHERE  ID = ?', $emailUser, $hashed_password_new, $_SESSION['user_id']);
                        $_SESSION['user_email'] = $emailUser;
                        echo 'Gewijzigd';
                    }
                } else
                {
                    echo 'token is invalid';
                }
            }
        }
        $user_info = $this->db->query('SELECT * FROM user WHERE ID = ?', $_SESSION['user_id'])->fetchArray();

        echo '<div class="container-form">
                <h1 class="title">Uw gegevens</h1>
                <form class="form login-form" action="" method="post">
                <input type="hidden" name="token" value="' . $_SESSION['token'] . '">
                    Uw email:
                    <div class="input-icon">
                        <input class="input" value="' . $user_info['email'] . '" type="text" name="emailUser" class="login-inputs" placeholder="Uw email" required><br>
                    </div>
                    Wachtwoord wijzig? Vul eerst hier uw huidige wachtwoord in
                    <div class="input-icon">
                        <input class="input" type="password" name="userPassword" id="loginPasswordInput" class="login-inputs" placeholder="Uw huidige wachtwoord" required><br>
                    </div>
                    Uw nieuwe wachtwoord:
                    <div class="input-icon">
                        <input class="input" type="text" name="newPasswordUser" class="login-inputs" placeholder="Uw nieuwe wachtwoord" required><br>
                    </div>
                    <button type="submit" name="submit" class="button">Wijzig</button>
                </form>
            </div>';
    }
}
