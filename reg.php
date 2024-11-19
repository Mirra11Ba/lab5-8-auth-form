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
            //md5 для хэширования пароля, чтобы отправить в БД пароль в зашифрованном виде.
            $password = md5($_POST['password']);
            
            //проверка на наличие пароля и email в БД
            function userExistInDatabase($email, $password)
            {
                require('db.php');

                $resultEmail = mysqli_query($link,"SELECT id FROM users_bagrova_m WHERE email = '" . $email . "' AND password = '".$password."' ");
                if (mysqli_num_rows($resultEmail) > 0) 
                {
                    echo 'Email и пароль занят';
                    return true;
                } 
                else 
                {
                    echo 'Email и пароль свободен, регистрация доступна.';
                    return false;
                }
            }
            //если не выполеняется скрипт выше userExistInDatabase, то
            //создается SQL-запрос для добавления инфы в БД
            if(!userExistInDatabase($email, $password))
            {
                $insertRegInfo = mysqli_query($link, "INSERT INTO `users_bagrova_m` (`login`, `email`, `password`)
                VALUES ('" .$login."', '".$email."', '".$password."')");
                $selectRegInfo = mysqli_query($link, "SELECT * FROM `users_bagrova_m` WHERE `id`=".mysqli_insert_id($link));
                $row = mysqli_fetch_assoc($selectRegInfo);

                if ($insertRegInfo) 
                {
                    echo '
                    <!DOCTYPE html>
                    <html lang="ru">
                        <head>
                            <link rel="stylesheet" type="text/css" href="super.css"/>
                            <meta charset = "utf8" />
                            <link rel="shortcut icon" href="img/key.png" type="image/png">
                            <script type="text/javascript" src="jquery-3.5.1.js"></script>
                            <title>ЛР №5-8</title>
                        </head>
                        <body>
                            <form class="decor" method="post" id="registration">
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
        }
        else
        {
            echo "<p>Пароли не совпадают<p>";
        }  
    }
?>