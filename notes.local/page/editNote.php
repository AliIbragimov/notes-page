<?php
include_once './module/connetion.php';
session_start();

$id = $_GET['addId'];
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
            <?
            $results='';
            if(!empty($_GET['addId'])){
              $results.= '<form action="" class="" name="form" method="post">
                              <input type="text" placeholder="Назавние" value="'.$_GET['addHeading'].'" name="heading">
                              <textarea class="text-content" placeholder="Напишите о чем думаете..." name="text">'.$_GET['addText'].'</textarea>
                              <input class="fm-btn" type="submit" value="Сохранить" name="submit">
                          </form>';
            }
            echo $results;

            ?>
        </div>
        <?php 
          if(isset($_POST['submit'])) {
            $heading = $_POST['heading'];
            $text = $_POST['text'];
            
            if ($mySql->query("UPDATE notes SET heading = '$heading', text_content = '$text' WHERE id_notes = '$id'")) {
              header("Location: ./notes.php");
              echo '<script>alert("Получилось");</script>';
            }
          }
        ?>
    </main>
    <script>
    </script>
    <script src="../style/dropdown.js"></script>
</body>
</html>