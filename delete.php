<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <title>Морозилочка</title>
  </head>
  <body>
  <?php
  if (!empty($_POST['id'])) {
      $id = $_POST['id'];
      echo "<h2>Вы достали из морозилочки:</h2>";
      require 'actions.php';
      echo deleteFromFreezer($id);
      echo "<h2>Положить что-то взамен?</h2>";
      echo '<form action="add.php" method="post" class="form-add">
	 	    <p>Что: <input type="text" name="product" /></p>
	        <p>Куда: <input type="radio" name="section" value="top"/>Верх
	        <input type="radio" name="section" value="bottom"/>Низ</p>
	        <p>Сколько: <input type="text" name="count" /></p>
	        <p><input type="submit" value="Добавить" /></p>
          </form>';

      echo '<div class="link">
        <a href="index.php">Вернуться в морозилочку</a>
      </div>';
  }
  else {
      $error_id = 'Вы не указали id продукта.<br />';
      echo "<h2>Не получилось достать: $error_id</h2>";
      echo '<div class="link">
        <a href="index.php">Вернуться в морозилочку</a>
      </div>';
  }
  ?>
  <div class="footer">
      <p>EasyFreezer by <a href="https://t.me/alexanderkholod">@alexkholod</a></p>
      <p>Версия <?php
          include 'config.php';
          if (isset($version)) {
              echo "$version";
          } ?></p>
  </div>
  </body>
</html>
