<?php

class alcohol
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addAlcohol()
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
                    $type_alcohol = htmlspecialchars($_POST['alcohol_types']);
                    $used_alcohol = htmlspecialchars($_POST['used_alcohol']);

                    $error = 0;

                    if (!is_numeric($used_alcohol))
                    {
                        $error = 1;
                    }

                    if ($used_alcohol == '' || $type_alcohol == '')
                    {
                        $error = 1;
                    }

                    if ($error === 0)
                    {
                        $this->db->query('INSERT INTO alcohol (user_id, alcohol_type_id, quantity)
                        VALUES (?,?,?)', $_SESSION['user_id'], $type_alcohol, $used_alcohol);

                        $_SESSION['addedAlcohol'] = 'Uw alcohol data is opgeslagen!';
                    } else
                    {
                        $_SESSION['errorAlcohol'] = 'Er is iets fout gegaan, probeer het opnieuw.';
                    }
                }
            }
        }
    }
}
