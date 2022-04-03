<?php
    require('db.php');
    
    if (!isset($_POST['login']) || !isset($_POST['email']) || 
    !isset($_POST['password']) || !isset($_POST['repeatPassword']))
    {
        die ("Не все данные введены.<br> Пожалуйста, вернитесь назад и закончите ввод");
    }
    else
    {
        if (isset($_POST['password']) == isset($_POST['repeatPassword']))
        {
            //получение значения из формы методом POST и конвертация значения в тип string с помощью addslashes
            //с присвоением значения переменной для каждого поля input
            $login = addslashes($_POST['login']);
            $email = addslashes($_POST['email']);
            //md5 для хэширования пароля через
            $password = addslashes($_POST['password']);
            //не работает при md5
            // $password = md5($_POST['password']);
            
            //проверка на наличие пароля и email в БД
            function userExistInDatabase($email, $password)
            {
                require('db.php');

                $result = mysqli_query($link,"SELECT id FROM users_bagrova WHERE email = '" . $email . "'");
                if (mysqli_num_rows($result) > 0) 
                {
                    echo 'Email занят';
                } 
                else 
                {
                    echo 'Email свободен';
                }





                // $sql = "SELECT id FROM users_bagrova WHERE login = $login AND password = " . $password;
                // if (!$result = $mysqli->query($sql)) {
                //     echo 'error:' . __METHOD__ . " : " . __LINE__; die;
                // }
                // if ($result->num_rows === 1) {
                //     return true;
                // }
            }
            //if(! userExistInDatabase) если не выполеняется скрипт
            //создание SQL-запроса для добавления инфы в БД
            $insertRegInfo = mysqli_query($link, "INSERT INTO `users_bagrova` (`login`, `email`, `password`)
            VALUES ('" .$login."', '".$email."', '".$password."')");
            $selectRegInfo = mysqli_query($link, "SELECT * FROM `users_bagrova` WHERE `id`=".mysqli_insert_id($link));
            $row = mysqli_fetch_assoc($selectRegInfo);
                
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
            else
            {
                print("Произошла ошибка при выполнении запроса");
            }
        }
        else
        {
            echo "<p>пароли не совпадают<p>";
        }
    }
?>