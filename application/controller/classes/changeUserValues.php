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
                    $isRoker = htmlspecialchars($_POST['smoker']);
                    $isDrugUser = htmlspecialchars($_POST['drugs']);

                    $user_info = $this->db->query('SELECT * FROM user WHERE ID = ?', $_SESSION['user_id'])->fetchArray();
                    $verifiedPassword = password_verify($passwordUser, $user_info['password']);
                    if ($passwordUser != $verifiedPassword)
                    {
                        $error = 1;
                        $alert = '<div class="alertsuccess">
                          <span class="closebtn">&times;</span>
                          Uw huidige wachtwoord klopt niet!
                          </div>';
                    }

                    if ($emailUser == '' || $passwordUser == '' || $newPasswordUser == '')
                    {
                        $alert = '<div class="alertsuccess">
                          <span class="closebtn">&times;</span>
                          Velden mogen niet leeg zijn!
                          </div>';
                        exit();
                    }

                    if ($isRoker == 'Nee')
                    {
                        $isRoker = 0;
                    } elseif ($isRoker == 'Ja')
                    {
                        $isRoker = 1;
                    }

                    if ($isDrugUser == 'Nee')
                    {
                        $isDrugUser = 0;
                    } elseif ($isDrugUser == 'Ja')
                    {
                        $isDrugUser = 1;
                    }

                    if ($error === 0)
                    {
                        $hashed_password_new = password_hash($newPasswordUser, PASSWORD_DEFAULT);
                        $updateQuery = $this->db->query('UPDATE user SET email = ?, password = ?, roker = ?, drugs = ? WHERE  ID = ?', $emailUser, $hashed_password_new, $isRoker, $isDrugUser, $_SESSION['user_id']);
                        $_SESSION['user_email'] = $emailUser;
                        $alert = '<div class="alertsuccess">
                          <span class="closebtn">&times;</span>
                          Gegevens gewijzigd!
                          </div>';
                    }
                } else
                {
                    echo 'token is invalid';
                }
            }
        }
        $user_info = $this->db->query('SELECT * FROM user WHERE ID = ?', $_SESSION['user_id'])->fetchArray();

        if ($user_info['roker'] === 1)
        {
            $isRokerNietChecked = '';
            $isRokerChecked = 'checked';
        } elseif ($user_info['roker'] === 0)
        {
            $isRokerNietChecked = 'checked';
            $isRokerChecked = '';
        }

        if ($user_info['drugs'] === 1)
        {
            $isDrugUserNietChecked = '';
            $isDrugUserChecked = 'checked';
        } elseif ($user_info['drugs'] === 0)
        {
            $isDrugUserNietChecked = 'checked';
            $isDrugUserChecked = '';
        }

        echo @$alert .'<div class="container-form">
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
                        <input class="input" type="password" name="newPasswordUser" class="login-inputs" placeholder="Uw nieuwe wachtwoord" required><br>
                    </div>
                    <p>Roker:</p>
                    <div class="input-icon">
                        <input class="" type="radio" ' . $isRokerChecked . ' name="smoker" value="Ja"> Ja
                        <input class="" type="radio" ' . $isRokerNietChecked . ' name="smoker" value="Nee"> Nee
                    </div>
                    <p style="margin-top: 8px">Drugs gebruiker:</p>
                    <div class="input-icon">
                        <input class="" type="radio" ' . $isDrugUserChecked . ' name="drugs" value="Ja"> Ja
                        <input class="" type="radio" ' . $isDrugUserNietChecked . ' name="drugs" value="Nee"> Nee
                    </div>
                    <button type="submit" name="submit" class="button">Wijzig</button>
                </form>
            </div>';
    }
}
