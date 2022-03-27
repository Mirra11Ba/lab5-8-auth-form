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
            $insertRegInfo = mysqli_query($link, "INSERT INTO `users_bagrova` (`login`, `email`, `password`)
            VALUES ('" .$login."', '".$email."', '".$password."')");
            $selectRegInfo = mysqli_query($link, "SELECT * FROM `users_bagrova` WHERE `id`=".mysqli_insert_id($link));
            $row = mysqli_fetch_assoc($selectRegInfo);
                
            //данные записываются в бд,  но не выводятся в форму
            if ($insertRegInfo) 
            {
                echo '
                <!DOCTYPE html>
                <html lang="ru">
                    <head>
                        <link rel="stylesheet" type="text/css" href="super.css"/>
                        <meta charset = "utf8" />
                        <script type="text/javascript" src="jquery-3.5.1.js"></script>
                        <title>ЛР №5-8</title>
                    </head>
                    <body>
                        <form class="decor" method="post" action="main.php" id="registration">
                            <div class="form-left-decoration"></div>
                            <div class="form-right-decoration"></div>
                            <div class="circle"></div>
                            <div class="form-inner">
                                <h3>Данные регистрации</h3>
                                <p style="color: black;">Ваша инфа добавлена в базу данных.</p><br>
                                
                                <p>Ваш логин: '.$row['login'].'<br></p>
                                <p>Ваша пароль: '.$row['password'].'<br></p>
                                <p>Ваш E-mail: '.$row['email'].'<br></p>
                            </div>
                        </form>
                    </body>
                </html> ';
                
                //закрытие соединения с БД
                mysqli_close($link);
            }
        }
        else
        {
            echo "<p>Введите пароль повторно<p>";
        }
    }
?>