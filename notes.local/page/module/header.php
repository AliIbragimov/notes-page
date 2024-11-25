<?
session_start();
?>

<header>
        <div class="hr-core">
            <a class="hr-logo" href="">NotePage</a>
            <div class="drop-down">
              <img id="menuBtn" src="../style/img/menu.svg" class="drop-btn" alt="">
              <div id="myDropdown" class="dropdown-content">
                  <a class="hr-a" href="../index.php">Главная</a>
                  <a class="hr-a" href="./addNote.php">Добавить</a>
                  <a class="hr-a" href="./notes.php">Заметки</a>
                  <?php 
                  if ($_SESSION['id_user'] != '') {
                    echo '<a class="hr-a" href="./page/login.php">'.$_SESSION['name'].'</a>'; 
                }
                  else {
                    echo '<a class="hr-a" href="./page/login.php">Войти</a>';
                }
                  ?>
              </div>
          </div>
        </div>
    </header>