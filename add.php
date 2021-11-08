<?php
session_start();
if($_GET['do'] == 'logout'){
 unset($_SESSION['admin']);
 session_destroy();
}
 if($_SESSION['admin'] != "admin"){
 header("Location: login.php");
exit;
}
      if (isset($_POST['addProduct'])) {
          if ($_POST['product'] != "") {
              $product = filter_var($_POST['product'], FILTER_SANITIZE_STRING);
              if ($product == "") {
                  $error_product = 'Пожалуйста, введите корректное название продукта. <br/><br/>';
              }
          }
          else {
              $error_product = 'Вы не ввели название продукта.<br />';
          }

          if ($_POST['count'] != "") {
              $count= filter_var($_POST['count'], FILTER_SANITIZE_STRING);
              if ($count == "") {
                  $error_count = 'Введите корректное количество: допускаются числа и слова. <br/><br/>';
              }
          }
          else {
              $error_count = 'Вы не ввели количество.<br />';
          }

          if(isset($_POST['section'])) {
              $section = $_POST['section'];
          }
          else {
              $error_section = 'Вы не указали отделение (верх или низ).<br />';
          }
      }
?>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <title>Морозилочка</title>
  </head>
  <body>
  <?php
    if (!$error_product && !$error_count && !$error_section) {
        $success = 'Вы успешно добавили<br/>';
    }
      if(isset($success)) {
         echo "<h2>$success</h2>";
         require 'actions.php';
         echo addToFreezer($product, $section, $count);
         echo '<h2>Добавить что-то еще?</h2>';
      }
      else {
          echo "<h2>$error_product<br/>$error_section<br/>$error_count<br/></h2>";
          echo '<h2>Попробовать еще раз?</h2>';
      }
      ?>

      <form action="add.php" method="post" class="form-add">
          <p>Что: <input type="text" name="product" /></p>
          <p>Куда: <input type="radio" name="section" value="top"/>Верх
              <input type="radio" name="section" value="bottom"/>Низ</p>
          <p>Сколько: <input type="text" name="count" /></p>
          <p><input type="submit" value="Добавить" name="addProduct"/></p>
      </form>

      <div class="link">
        <a href="index.php">Вернуться в морозилочку</a>
      </div>
  <div class="footer">
      <p>EasyFreezer by <a href="https://t.me/alexanderkholod">@alexkholod</a></p>
      <p>Версия <?php
          include 'config.php';
          if (isset($version)) {
              echo "$version";
          } ?></p>
          <div class="link">
            <a href="index.php?do=logout">Выйти</a>
          </div>
  </div>
  </body>
</html>
