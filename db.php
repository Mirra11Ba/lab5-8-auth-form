<?php
    $db_user = 'root';
    $db_password = 'root';
    $db_name = '3_bagrova';
    global $link;//переменная для подключения к БД

    //подключения к серверу базы данных в PHP 
        $link = new mysqli('localhost', $db_user, $db_password, $db_name);
        if ($link->connect_error) 
        {
            die('Connect Error (' . $link->connect_errno . ') ' . $link->connect_error);
        }
        //подключение к выбранной БД
        mysqli_select_db($link, $db_name) or die ("Невозможно открыть $db_name");
?>
