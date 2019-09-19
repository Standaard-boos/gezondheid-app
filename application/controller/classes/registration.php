<?php
    include_once '../../config/connection.php';
    $account = $db->query('SELECT * FROM drinks')->fetchArray();
    var_dump($account);

    class registration
    {
        protected $username;
        protected $email;
        protected $password;
        protected $weight;
        protected $height;
        protected $age;
        protected $gender;



    }
