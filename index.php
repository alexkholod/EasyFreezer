<!DOCTYPE html>
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
?>
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
//удаление через GET-запрос.
                    if(isset($_GET['del'])) {
                        $id = (int) $_GET['del'];
                        $db->exec('DELETE FROM freezer WHERE (id = '.$id.')');
                    }
                    $res = $db->query('SELECT id, product, count FROM freezer WHERE section = "top"');
                ?>
        <table>
            <td>id</td><td>Что</td><td>Сколько</td><td>Действие</td>
            <?php while ($row = $res->fetchArray()) { ?>
                <tr>
                    <td><?= $row['id'];?></td>
                    <td><?= $row['product'];?></td>
                    <td><?= $row['count'];?></td>
                    <td><a href="?del=<?= $row['id'];?>">Достать</a></td>
                </tr>
                <?php
            }
            $db->close();          // выводится
            ?>
        </table>
    </div>
    <div>
    	<h2>-- Нижний отдел --</h2>
    	<?php
        include 'config.php';
        $db = new SQLite3('freezer.db');
        $res = $db->query('SELECT id, product, count FROM freezer WHERE section = "bottom"');
        ?>
            <table>
                <td>id</td><td>Что</td><td>Сколько</td><td>Действие</td>
                <?php while ($row = $res->fetchArray()) { ?>
                    <tr>
                        <td><?= $row['id'];?></td>
                        <td><?= $row['product'];?></td>
                        <td><?= $row['count'];?></td>
                        <td><a href="?del=<?= $row['id'];?>">Достать</a></td>
                    </tr>
                <?php
                }
                $db->close();          // выводится
                ?>
            </table>
    </div>
    <div>
    	  <h2>Положить в морозилочку:</h2>
    	  <form action="add.php" method="post" class="form-add">
	 	    <p>Что: <input type="text" name="product" /></p>
	        <p>Куда: <input type="radio" name="section" value="top"/>Верх
	        <input type="radio" name="section" value="bottom"/>Низ</p>
	        <p>Сколько: <input type="text" name="count" /></p>
	        <p><input type="submit" value="Добавить" name="addProduct" /></p>
          </form>

<!-- //Реализовано удаление через GET-запрос / 19.11.2020
          <h2>Достать размораживаться:</h2>
          <form action="delete.php" method="post" class="form-add">
            <p>Введите "id": <input type="text" name="id" /></p>
            <p><input type="submit" value="Удалить" name="deleteProduct" /></p>
          </form>
-->
    </div>

    <div class="footer">
        <p>EasyFreezer by <a href="https://t.me/alexanderkholod">@alexkholod</a></p>
        <p>Версия <?php if (isset($version)) {
                echo "$version";
            } ?></p>
            <div class="link">
              <a href="index.php?do=logout">Выйти</a>
            </div>
    </div>
  </body>
</html>
