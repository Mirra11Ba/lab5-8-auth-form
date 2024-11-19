<?php
    require('db.php');
    
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $sqlSelectUser = "SELECT * FROM users_bagrova_m WHERE login='" .$login. "' AND password='". $password. "'";
    $result = mysqli_query($link, $sqlSelectUser);
    if (mysqli_num_rows($result) > 0) 
    {
        
        echo '
            <!DOCTYPE html>
            <html lang="ru">
                <head>
                    <link rel="stylesheet" type="text/css" href="super.css"/>
                    <link rel="shortcut icon" href="img/key.png" type="image/png">
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
                            <h3>Успешный вход!</h3>
                            <p>Добро пожаловать (((o(*°▽°*)o)))</p>
                        </div>
                    </form>
                </body>
            </html> ';
    } 
    else
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
                        <h3>Ошибка авторизации!</h3>
                        <p>Проверьте свои данные при авторизации или зарегистрируейтесь.</p>
                    </div>
                </form>
            </body>
        </html> ';
        
    }
?>