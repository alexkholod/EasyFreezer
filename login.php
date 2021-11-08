<?php
session_start();
if($_GET['do'] == 'logout'){
 unset($_SESSION['admin']);
 session_destroy();
}
$users = 'admin'; //прибитый гвоздями username
$pass = 'd1f786307eff9e01ba1b53828d'; //хеш прибитого гвоздями пароля
 if($_POST['submit']){
 if($users == $_POST['user'] AND $pass == md5($_POST['pass']))
{
 $_SESSION['admin'] = $users;
 header("Location: index.php");
 exit;
 }
else echo '<p>Логин или пароль неверны!</p>';
}
?>

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
      <form method="post" class="form-add">
        <p>Username: <input type="text" name="user" /></p>
        <p>Password: <input type="password" name="pass" /></p>
        <p><input type="submit" name="submit" value="Login" /></p>
      </form>
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
