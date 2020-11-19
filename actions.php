<?php 

function addToFreezer($product, $section, $count) {
    $db = new SQLite3('freezer.db');
    $db->exec("INSERT INTO freezer(product, section, count) VALUES ('$product', '$section', '$count')");
    $result = "$product" . ", " . "$count" . " в " . ($section == 'top' ? "верхнюю" : "нижнюю") . " секцию.";
    $db->close();
    return $result;
}

//Реализовано удаление через GET-запрос / 19.11.2020
// function deleteFromFreezer($id) {
// 	$db = new SQLite3('freezer.db');
// 	$res = $db->query('SELECT * FROM freezer WHERE (id = '.$id.')');
// 	while ($row = $res->fetchArray()) {
// 	$result2 = "{$row['product']}" . " {$row['count']}";
//    }
// 	$db->exec('DELETE FROM freezer WHERE (id = '.$id.')');
// 	$db->close();
// 	return $result2;
// }