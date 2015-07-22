<!-- Модифицируйте свою галерею. Теперь ваш скрипт должен читать список файловиз таблицы базы данных и выводить их на страницу. В таблице хранятся пути до файлов. Измените и форму добавлени файла в галерею. Добавьте поле Название. Оно тоже должно сохраняться в БД и выводиться в галерее. -->
<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('php_lesson7');

function nameFiles(){
    $query = 'SELECT address FROM files';
    $res = mysql_query($query);
    $result = [];
    while (false !== ($row = mysql_fetch_row($res))) {
        $result[] = $row['0'];
    }
    return $result;
}

function titles(){
    $query = 'SELECT title FROM files';
    $res = mysql_query($query);
    $result = [];
    while (false !== ($row = mysql_fetch_row($res))) {
        $result[] = $row['0'];
    }
    return $result;
}

$files = nameFiles();
//var_dump($files);
chdir('images');
$finfo = finfo_open(FILEINFO_MIME_TYPE);        //сделал по примеру из мануала
$typesFiles = [];
foreach ($files as $fileName) {
    $typesFiles[$fileName] = finfo_file($finfo, $fileName);     //создание массива, ключ - имя файла, значение - тип файла
}
finfo_close($finfo);

//var_dump($typesFiles);

$validTypes = ['image/jpeg', 'image/gif', 'image/png'];     //типы файлов картинок, которые поддерживает браузер
$imagesFiles = array_intersect($typesFiles, $validTypes);   //сравнение массива всех типов файлов в папке с типами файлов картинок, c сохранением имен файлов

//var_dump($imagesFiles);

$titles = titles();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Галерея</title>
        <style>
            .gallery {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .gallery td {
                border: 1px solid black;
            }
            .gallery img {
                max-width: 250px;
            }
        </style>
    </head>
    <body>
        <h3>Галерея</h3>
        <table class="gallery">
            <tr><?php foreach ($imagesFiles as $imageFileName => $typeFile):?>
            <td><img src="./images/<?php echo $imageFileName; ?>"></td>
            <?php endforeach; ?>
            </tr>
            <tr><?php foreach($titles as $title):?>
            <td><?php echo $title; ?></td>
            <?php endforeach; ?></tr>
        </table>
        <form action="putimage.php" method="post" enctype="multipart/form-data">
            Выберите картинку: <input type="file" name="image"><br>
            Введите название: <input type="text" name="title"><br>
            <input type="submit" value="Загрузить">
        </form>
    </body>
</html>