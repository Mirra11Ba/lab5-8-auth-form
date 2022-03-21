<?php
    require('db.php');

    // $db_user = 'root';
    // $db_password = 'root';
    // $db_name = '3_bagrova';

    
    if (!isset($_POST['name']) || !isset($_POST['lastName']) || 
    !isset($_POST['email']) || !isset($_POST['comment']))
    {
        die ("Не все данные введены.<br> Пожалуйста, вернитесь назад и закончите ввод");
    }
    else
    {
        //получение значения из формы методом POST и конвертация значения в тип string
        //с присвоением значения переменной для каждого поля input
        $name = addslashes($_POST['name']);
        $lastName = addslashes($_POST['lastName']);
        $email = addslashes($_POST['email']);
        $comment = addslashes($_POST['comment']);

        //подключения к серверу базы данных в PHP 
        // $link = new mysqli('localhost', $db_user, $db_password, $db_name);
        // if ($link->connect_error) 
        // {
        //     die('Connect Error (' . $link->connect_errno . ') ' . $link->connect_error);
        // }
        // //подключение к выбранной БД
        // mysqli_select_db($link, $db_name) or die ("Невозможно открыть $db_name");
        
        //создание SQL-запроса для добавления инфы в базу
        $query = "INSERT INTO userinfo VALUES ('"
                .$name."', '".$lastName."', '".$email."', 
                '".$comment."')";

        $result = mysqli_query ($link, $query);
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
?>