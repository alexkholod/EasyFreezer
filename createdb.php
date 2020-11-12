<?php
include 'config.php';

$db = new SQLite3(DB_NAME);

if ($db) echo 'База данных успешно создана<br>';

$db->exec("CREATE TABLE IF NOT EXISTS freezer( 
           id INTEGER PRIMARY KEY AUTOINCREMENT,
           product TEXT,
           section TEXT,
           count TEXT)");

$db->exec("INSERT INTO freezer(product, section, count) VALUES ('Говядина', 'top', '1 пакет')");
if ($db->query('SELECT * FROM freezer')) echo 'Таблица существует<br>';

echo 'Пробуем выбрать из базы данных...<br>';

$res = $db->query('SELECT * FROM freezer');

echo "Выборка:<br>";

echo " id Что Где Сколько <br>";

while ($row = $res->fetchArray()) {
    echo "{$row['id']} {$row['product']} {$row['section']} {$row['count']} <br>";
}

echo 'Выборка прошла успешно<br>';

$db->exec('DELETE FROM freezer');

$db->close;

echo 'конец';

