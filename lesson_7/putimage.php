<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('php_lesson7');

$uploadDir = __DIR__ . '/images/';
$newName = $uploadDir . basename($_FILES['image']['name']);
$validTypes = ['image/jpeg', 'image/gif', 'image/png'];

if ( in_array($_FILES['image']['type'], $validTypes) ) {
    if ( is_uploaded_file($_FILES['image']['tmp_name']) ) {
        $res = move_uploaded_file($_FILES['image']['tmp_name'], $newName);
        $title = $_POST['title'];
        $address = $_FILES['image']['name'];
        $query = "INSERT INTO files (title, address) VALUES ('$title', '$address')";
        mysql_query($query);
        header('Location: ./index.php');
    } else echo "Файл не загружен<br><a href=\"index.php\">Назад</a>";

} else echo "Загружать можно только картинки формата GIF, JPEG, PNG<br><a href=\"index.php\">Назад</a>";


