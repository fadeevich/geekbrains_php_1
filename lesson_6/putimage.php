<?php
$uploadDir = __DIR__ . '/images/';
$newName = $uploadDir . basename($_FILES['image']['name']);

$validTypes = ['image/jpeg', 'image/gif', 'image/png'];

if ( in_array($_FILES['image']['type'], $validTypes) ) {
    if ( is_uploaded_file($_FILES['image']['tmp_name']) ) {
        $res = move_uploaded_file($_FILES['image']['tmp_name'], $newName);
        header('Location: ./index.php');
    } else echo "Файл не загружен<br><a href=\"index.php\">Назад</a>";

} else echo "Загружать можно только картинки формата GIF, JPEG, PNG<br><a href=\"index.php\">Назад</a>";