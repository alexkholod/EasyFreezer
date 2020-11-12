
<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Морозилочка</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
  </head>
  <body>
    <div class="header">
    <h1>== Морозилочка моя ==</h1>
    <p>Сегодня <?php echo date("d.m.Y");?> г.</p>
    </div>
    <div>
    	<h2>-- Верхний отдел --</h2>

                <?php 
                    $db = new SQLite3('freezer.db');
                    $res = $db->query('SELECT id, product, count FROM freezer WHERE section = "top"');                        
                    $table = "<table>
                    <td>id</td><td>Что</td><td>Сколько</td>";

                    while ($row = $res->fetchArray()) {               //цикл        
                    $table .= "<tr>";
                    $table .= "<td >".$row['id']."</td>";
                    $table .= "<td >".$row['product']."</td>";
                    $table .= "<td >".$row['count']."</td>";
                    $table .= "</tr>";
                     }
                    $table .= "</table>";
                    echo $table; 
                    $db->close();          // выводится
                    //echo "{$row['id']} {$row['product']} {$row['count']} <br>";
                ?>
    </div>
    <div>
    	<h2>-- Нижний отдел --</h2>
    	<?php 
                    include 'config.php';
                    $db = new SQLite3('freezer.db');
                    $res = $db->query('SELECT id, product, count FROM freezer WHERE section = "bottom"');                        
                    $table = "<table>
                    <td>id</td><td>Что</td><td>Сколько</td>";

                    while ($row = $res->fetchArray()) {                       //цикл
                    $table .= "<tr>";
                    $table .= "<td >".$row['id']."</td>";
                    $table .= "<td >".$row['product']."</td>";
                    $table .= "<td >".$row['count']."</td>";
                    $table .= "</tr>";
                     }
                    $table .= "</table>";
                    echo $table; 
                    $db->close();           // выводится
                    //echo "{$row['id']} {$row['product']} {$row['count']} <br>";
                ?>
    </div>
  
    	  <h2>Положить в морозилочку:</h2>
    	  <form action="add.php" method="post" class="form-add">
	 	    <p>Что: <input type="text" name="product" /></p>
	        <p>Куда: <input type="radio" name="section" value="top"/>Верх
	        <input type="radio" name="section" value="bottom"/>Низ</p>
	        <p>Сколько: <input type="text" name="count" /></p>
	        <p><input type="submit" value="Добавить" /></p>
          </form>
      
          <h2>Достать размораживаться:</h2>
          <form action="delete.php" method="post" class="form-add">
            <p>Введите "id": <input type="text" name="id" /></p>
            <p><input type="submit" value="Удалить" /></p>
          </form>
    </div>
    <div class="footer">
        <p>EasyFreezer by <a href="https://t.me/alexanderkholod">@alexkholod</a></p>
        <p>Версия <?php echo "$version" ?></p>
    </div>
  </body>
</html>
