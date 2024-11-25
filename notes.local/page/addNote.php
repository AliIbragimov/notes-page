<?php
include_once './module/connetion.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блокнот онлайн</title>
    <link rel="stylesheet" href="../style/fonts.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="stylesheet" href="../style/adaptive.css">
</head>
<body>
<header>
        <div class="hr-core">
            <a class="hr-logo" href="">NotePage</a>
            <div class="drop-down">
              <img id="menuBtn" src="../style/img/menu.svg" class="drop-btn" alt="">
              <div id="myDropdown" class="dropdown-content">
                  <?php 
                  if (!empty($_SESSION['id_user'])) {
                    echo '<a class="hr-a" href="#">'.$_SESSION['name'].'</a>'; 
                    }
                  else {
                    echo '<a class="hr-a" href="../index.php">Главная</a>';
                    }
                  ?>
                  <a class="hr-a" href="./addNote.php">Добавить</a>
                  <a class="hr-a" href="./notes.php">Заметки</a>
                  <?php 
                  if (!empty($_SESSION['id_user'])) {
                    echo '<a class="hr-a" href="./module/logout.php">Выход</a>'; 
                    }
                  else {
                    echo '<a class="hr-a" href="./login.php">Войти</a>';
                    }
                  ?>
              </div>
          </div>
        </div>
    </header>
    
    <main>
        <div class="mn-fm">
            <div>
                <h2>Заметка</h2>
            </div>
            <form action="#" class="" name="form" method="post">
                <input type="text" placeholder="Назавние" name="heading">
                <textarea class="text-content" placeholder="Напишите о чем думаете..." name="text"></textarea>
                <input class="fm-btn" type="submit" value="Сохранить" name="submit">
            </form>
        </div>
        <?php 
        if (isset($_POST['submit'])) {
            $heading = $mySql->real_escape_string($_POST["heading"]);
            $text = $mySql->real_escape_string($_POST["text"]);
            $date = (date("Y-m-d H:i:s"));
            $id_user = $mySql->real_escape_string($_SESSION['id_user']);

            $prom = "INSERT INTO notes (id_user, heading, text_content, date) VALUES ('$id_user', '$heading', '$text', '$date')";
            if($mySql->query($prom)){
                echo '<script>window.location = "./notes.php";</script>';
            } else{
                echo "Ошибка: " . $mySql->error;
            }
        }
        ?>
    </main>

    <script src="../style/dropdown.js"></script>
</body>
</html>