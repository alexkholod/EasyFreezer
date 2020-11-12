<?php
      if (isset($_POST['product'])) {

      $product = $_POST['product'];
      $section = $_POST['section'];
      $count = $_POST['count'];
      }
?>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <title>Морозилочка</title>
  </head>
  <body>
      <h2>Вы успешно добавили:</h2>
      <h2>
    	 <?php
         require 'actions.php';
         echo addToFreezer($product, $section, $count);
       ?> 
      </h2>
      <div class="link">
        <a href="index.php">Вернуться в морозилочку</a>
      </div>
  </body>
</html>