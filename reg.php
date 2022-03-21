<?php
    require('db.php');

    // $db_user = 'root';
    // $db_password = 'root';
    // $db_name = '3_bagrova';

    
    if (!isset($_POST['login']) || !isset($_POST['email']) || 
    !isset($_POST['password']) || !isset($_POST['repeatPassword']))
    {
        die ("Не все данные введены.<br> Пожалуйста, вернитесь назад и закончите ввод");
    }
    else
    {
        if (isset($_POST['password']) == isset($_POST['repeatPassword']))
        {
            //получение значения из формы методом POST и конвертация значения в тип string
            //с присвоением значения переменной для каждого поля input
            $login = addslashes($_POST['login']);
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
    
            //подключения к серверу базы данных в PHP 
            // $link = new mysqli('localhost', $db_user, $db_password, $db_name);
            // if ($link->connect_error) 
            // {
            //     die('Connect Error (' . $link->connect_errno . ') ' . $link->connect_error);
            // }
            // //подключение к выбранной БД
            // mysqli_select_db($link, $db_name) or die ("Невозможно открыть $db_name");
            
            //создание SQL-запроса для добавления инфы в БД

            //разобраться
            // $insert  = "INSERT INTO `users_bagrova` (`login`, `email`, `password`)
            // VALUES ('" .$login."', '".$email."', '".$password."')";

            $result = mysqli_query ($link, $$insert);
            if ($result) 
            {
                echo "<h4>Ваша инфа добавлена в базу данных.</h4>";
                echo "Ваше имя: $name <br>";
                echo "Ваша фамилия: $lastName <br>";
                echo "Ваш E-mail: $email <br>";
                echo "В поле комментария было: $comment <br>";
            }
    
            //закрытие соединения с БД
            mysqli_close ($link);
        }
        else
        {
            echo "<p>Введите пароль повторно<p>";
        }
    }
?>