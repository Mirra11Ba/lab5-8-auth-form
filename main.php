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
        
        //создание SQL-запроса для добавления инфы в базу
        $query = "INSERT INTO users_bagrova VALUES ('"
                .$login."', '".$email."', '".$password."')";

        $result = mysqli_query ($link, $query);
        if ($result) 
        {
            echo "
                <html>
                <head></head>
                <body>
                <h4>Ваша инфа добавлена в базу данных.</h4>
                <p>Ваш логин: $login </p><br>
                <p>Ваша пароль: $password </p><br>
                <p>Ваш E-mail: $email </p><br>
                </body>";

                    /*
                     {
                        echo "<h4>Ваша инфа добавлена в базу данных.</h4>";
                        echo "Ваше имя: $name <br>";
                        echo "Ваша фамилия: $lastName <br>";
                        echo "Ваш E-mail: $email <br>";
                        echo "В поле комментария было: $comment <br>";
                    }
                    */
           
            
            
        }

        //закрытие соединения с БД
        mysqli_close ($link);
    }
?>