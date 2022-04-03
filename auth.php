<?php
    require('db.php');
    
    // $login = "DemoAdmin";
    // $password = "48503dfd59720bd5ff56c102065a52d7"; //В реальности считывается из БД
    // if (($_GET['login'] == $login) && (md5($_GET['password']) == $password)) echo "Привет, Хозяин!";
    // else echo "Ты не Хозяин!";
    $sql = "SELECT * FROM `users_bagrova` WHERE `login`='" .$login. "' AND `password`='". $password. "'";
    $result = mysqli_query($link, $sql);
    //не работает lf;t tckb lfyyst yt dthyst d[jl]
    if (mysqli_num_rows($result) > 0) 
    {
        echo "Добро пожаловать (((o(*°▽°*)o)))";
    } 
    else
    {
        echo "Ошибка авторизации";
    }
?>