<?php
include_once './module/connetion.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
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
                  <a class="hr-a" href="./registration.php">Регистарция</a>
              </div>
          </div>
        </div>
    </header>

    <main>
        <div class="mn-core log-core">
            <div class="mn-content">
                <div><h2>АВТОРИЗАЦИЯ</h2></div>
                <form action="#" class="" name="form" method="post">
                    <div class="fm-div">
                        <label for="" class="">Электронная почта</label>
                        <input type="text" placeholder="Введите лектронную почту..." id="email_id" name="email" class="input-from-html">
                    </div>
                        <div class="fm-div">
                            <label for="" class="">Пароль</label>
                            <input type="password" placeholder="Введите пароль..." id="" name="password" class="input-from-html">
                        </div>
                    <div class="fm-btn">
                        <input id="btn-reg" type="submit" value="Войти" name="submit">
                    </div>  
                    <div class="other-fm">   
                        <a href="./registration.php">У вас нет учетной записи?</a>
                        <a href="">Вы забыли пароль?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $pas = $_POST['password'];
        if (!empty($email) || !empty($pas)) {
            $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$pas'";
            $result = $mySql->query($sql);
            if ($result -> num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    session_start();
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
            } else {
              echo '<script>
            for (var i = 0; i < document.querySelectorAll(".input-from-html").length; i++) {
            document.querySelectorAll(".input-from-password")[i].style = "border: 1px solid red";}
            </script>';
        }
      }
    ?>
    <script src="../style/dropdown.js"></script>
</body>
</html>