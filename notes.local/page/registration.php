<?php
include_once './module/connetion.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/forms.css">
    <link rel="stylesheet" href="../style/adaptive.css">
</head>
<body>
<header>
        <div class="hr-core">
            <a class="hr-logo" href="">NotePage</a>
            <div class="drop-down">
              <img id="menuBtn" src="../style/img/menu.svg" class="drop-btn" alt="">
              <div id="myDropdown" class="dropdown-content">
                  <a class="hr-a" href="../index.php">Главная</a>
                  <a class="hr-a" href="./login.php">Войти</a>
              </div>
          </div>
        </div>
    </header>

    <main>
        <div class="mn-core">
            <div class="mn-content">
                <div><h2>РЕГИСТРАЦИЯ</h2></div>
                <form action="#" class="" name="form" method="post">
                    <div class="fm-div">
                        <label for="" class="">Имя пользователя</label>
                        <input type="text" placeholder="Введите ваше имя..." name="name" class="input-from-html">
                    </div>
                    <div class="fm-div">
                        <label for="" class="">Электронная почта</label>
                        <input type="text" placeholder="Введите лектронную почту..." name="email" class="input-from-html">
                    </div>
                    <div class="fm-pas">
                        <div class="fm-div">
                            <label for="" class="">Пароль</label>
                            <input type="password" placeholder="Введите пароль..." name="pass" class="input-from-html input-from-password">
                        </div>
                        <div class="fm-div">
                            <label for="" class="">Повторный пароль</label>
                            <input type="password" placeholder="Введите повторный пароль..." name="passAgain" class="input-from-html input-from-password">
                        </div>
                    </div>   
                    <div class="fm-btn">
                        <input id="btn-reg" type="submit" value="зарегистрироваться" name="submit">
                    </div>  
                    <div class="other-fm">   
                        <a href="./login.php">У вас уже есть учетная запись?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <? 
    if (isset($_POST['submit'])) {
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['passAgain'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);
        $passAgain = htmlspecialchars($_POST['passAgain']);
        if ($pass == $passAgain) {
            if ($mySql -> query("INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$pass')")) {
                    $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'";
                    $result = $mySql->query($sql);
                    if ($result -> num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['id_user'] = $row['id_user'];
                        
                        echo  '<script>window.location.replace("./notes.php");</script>';
                    }
                    } else {
                    echo  '<script>
                            for (var i = 0; i < document.querySelectorAll(".email_id").length; i++) {
                            document.querySelectorAll(".email_id")[i].style = "border: 1px solid red";}
                            </script>';
                }   
                    echo '<script>
                    for (var i = 0; i < document.querySelectorAll(".input-from-html").length; i++) {
                    document.querySelectorAll(".input-from-html")[i].style = "border: 1px solid green";}
                    setTimeout(window.location = "./notes.php", 5000)
                    </script>';
                }
        } else {
            echo '<script>
            for (var i = 0; i < document.querySelectorAll(".input-from-password").length; i++) {
            document.querySelectorAll(".input-from-password")[i].style = "border: 1px solid red";}
            </script>';
        }
    } else {
        echo '<script>
        for (var i = 0; i < document.querySelectorAll(".input-from-html").length; i++) {
        document.querySelectorAll(".input-from-html")[i].style = "border: 1px solid red";}
        </script>';
    }
    } ?>
    <script src="../style/dropdown.js"></script>
</body>
</html>