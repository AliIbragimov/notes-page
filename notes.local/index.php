<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блокнот онлайн</title>
    <link rel="stylesheet" href="./style/fonts.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/adaptive.css">
</head>
<body>
    <header>
        <div class="hr-core">
            <a class="hr-logo" href="">NotePage</a>
            <div class="drop-down">
              <img id="menuBtn" src="./style/img/menu.svg" class="drop-btn" alt="">
              <div id="myDropdown" class="dropdown-content">
                  <a class="hr-a" href="./index.php">Главная</a>
                  <a class="hr-a" href="./page/login.php">Войти</a>
              </div>
          </div>
        </div>
    </header>
    <section style="height: 550px;">
        <div class="sc-core">
          <div>
            <img src="./style/img/book.jpeg" alt="">
          </div>
          <div class="sc-content">
            <div>
                <h2>Удобный блокнот!</h2>
                <p>Легко добавляйте и изменяйте ваши заметки. Записывайте свои мысли в нашу надежную систему NotePage и будьте уверены в их безопастности !</p>
                <a href="./page/registration.php">НАЧАТЬ</a>
            </div>
          </div>
        </div>
      </section>

      <script src="./style/dropdown.js"></script>
</body>
</html>