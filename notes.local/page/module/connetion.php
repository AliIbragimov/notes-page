<?php
    $mySql = @new mysqli ("MySQL-8.2", "root", "", "notePage");

    if ($mySql -> connect_errno) {
        die('Неудалось подключиться к БД' . $mySQL -> connect_errno);
    }
?>