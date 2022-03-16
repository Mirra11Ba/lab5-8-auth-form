<?php
    $bd_user = 'root';
    $bd_password = '';
    $bd_name = '3_bagrova_m';

    //подключения к серверу базы данных в PHP 
        $link = new mysqli('localhost', $bd_user, $bd_password, $bd_name);
        if ($link->connect_error) 
        {
            die('Connect Error (' . $link->connect_errno . ') ' . $link->connect_error);
        }
        //подключение к выбранной БД
        mysqli_select_db($link, $bd_name) or die ("Невозможно открыть $bd_name");
        

?>
