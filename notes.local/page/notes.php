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
      <div id="content">
            <?php
                    $sql = "SELECT * FROM notes WHERE id_user = ".$_SESSION['id_user']."";
                    if($result = mysqli_query($mySql, $sql)){
                      $results='';
                       foreach($result as $row) {
                           $results.='<section class="notes-section section" id="'.$row['id_notes'].'">
                                         <div id= "noteContent" class="note-content">
                                         <div class="note-panel">
                                             <label id="dateNotes" for="">'.$row['date'].'</label>
                                             <form class="test-form" action="" name="" method="post">
                                                <button type="submit" name="editNotes" id="edit" class="insert-btn btn" value="Изменить">Изменить</button>
                                                <button type="submit" name="deleteNotes" class="delete-btn btn" value="'.$row['id_notes'].'">Удалить</button>
                                              </form>
                                         </div>
                                             <div class="note-h2"><h2 id="headingH2">'.$row['heading'].'</h2></div>
                                             <div class="note-text"><p id="textArea">'.$row['text_content'].'</p></div>
                                         </div>
                                    </section>';
                         }
                      echo $results;
                    } else {
                      echo "Что-то пошло не так...";
                    }

                    if (isset($_POST['deleteNotes']) and is_numeric($_POST['deleteNotes'])) {
                      $delete = $_POST['deleteNotes'];
                      if ($mySql -> query("DELETE FROM `notes` WHERE `id_notes` = '$delete'")) {
                        echo '<script>window.location.replace("./notes.php")</script>';
                      }
                    }
                    ?>
        </div>
    </main>
    <script>
        if (document.querySelector('section') == null) {
            document.getElementById('content').insertAdjacentHTML('afterbegin', '<h2 class="empty-h2">У вас нет заметок...</h2>');
        }
    </script>
    <script src="../style/dropdown.js"></script>
    <script src="../script/script.js"></script>
</body>
</html>