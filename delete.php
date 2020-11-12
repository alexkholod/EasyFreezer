<?php
      if (isset($_POST['id'])) {

      $id = $_POST['id'];
      }
?>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <title>Морозилочка</title>
  </head>
  <body>
      <h2>Вы достали из морозилочки:</h2>
      <h2>
    	<?php
        require 'actions.php';
        echo deleteFromFreezer($id);
       ?> 
      </h2>

      <h2>Положить что-то взамен?</h2>
    	  <form action="add.php" method="post" class="form-add">
	 	    <p>Что: <input type="text" name="product" /></p>
	        <p>Куда: <input type="radio" name="section" value="top"/>Верх
	        <input type="radio" name="section" value="bottom"/>Низ</p>
	        <p>Сколько: <input type="text" name="count" /></p>
	        <p><input type="submit" value="Добавить" /></p>
          </form>
      
      <div class="link">
        <a href="index.php">Вернуться в морозилочку</a>
      </div>
  </body>
</html>