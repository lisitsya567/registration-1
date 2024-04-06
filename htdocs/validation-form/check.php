<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        echo "Nedopustimaya dlina logina";
        exit();
    } else if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
        echo "Nedopustimaya dlina imeni";
        exit();
    } else if(mb_strlen($pass) < 3 || mb_strlen($pass) > 50) {
        echo "Nedopustimaya dlina parolya (ot 2 do 6)";
        exit();
    }

    $pass = md5($pass."sgdfjh2345");

    $mysql = new mysqli('localhost', 'root', 'root', 'register-bd', '3307');
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`)
    VALUES('$login', '$pass', '$name')");

    $mysql->close();

    header('Location: /');
?>