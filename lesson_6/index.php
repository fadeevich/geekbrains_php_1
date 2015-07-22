<!-- Создайте фотогалерею. Ваш скрипт должен читать список файлов из определённой папки, отбирать из них изображения и выводить их на страницу. Также на странице должна быть форма добавления файла в галерею. Обработчик этой формы должен копировать загруженный файл в указанную папку и возвращаться на страницу галереи. -->
<?php
$files = scandir(__DIR__ . '/images/');

chdir('images');
$finfo = finfo_open(FILEINFO_MIME_TYPE);        //сделал по примеру из мануала
$typesFiles = [];
$typesFileImage = ['image/jpeg', 'image/gif', 'image/png'];     //типы файлов картинок, которые поддерживает браузер
foreach ($files as $fileName) {
    $typesFiles[$fileName] = finfo_file($finfo, $fileName);     //создание массива, ключ - имя файла, значение - тип файла
}
finfo_close($finfo);
//var_dump($typesFiles);
$imagesFiles = array_intersect($typesFiles, $typesFileImage);   //сравнение массива всех типов файлов в папке с типами файлов картинок, c сохранением имен файлов
//var_dump($imagesFiles);?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Галерея</title>
        <style>
            .gallery {
                border: solid 1px #000000;
            }
            .gallery img {
                display: inline-block;
                width: 250px;
            }
        </style>
    </head>
    <body>
        <h3>Галерея</h3>
        <div class="gallery">
            <?php foreach ($imagesFiles as $imageFileName => $typeFile):?>
            <?php echo "<img src=\"./images/$imageFileName\">" ?>
            <?php endforeach; ?>
        </div>
        <form action="putimage.php" method="post" enctype="multipart/form-data">
        <span>Выберите картинку:</span><input type="file" name="image"><br>
        <input type="submit" value="Загрузить">
        </form>
    </body>
</html>