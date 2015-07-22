<!-- Создайте простейший калькулятор. Он должен состоять из двух полей для ввода чисел, а между ними - select для выбора операции. По нажатию на кнопку = должно вычисляться значение выражения -->
<?php
if (isset($_POST['number_1']) && isset($_POST['number_2'])) {       //проверка наличия элемента в массиве
    if (is_numeric($_POST['number_1']) || is_numeric($_POST['number_2'])) {     //проверка наличия в переменной числа, а не символов
        if ($_POST['number_2'] == 0 && $_POST['operation'] == 'divide') {       //проверка деления на ноль
            $error = "Делить на ноль нельзя";
        } elseif ($_POST['operation'] == 'add'){
            $result = $_POST['number_1'] + $_POST['number_2'];
        } elseif($_POST['operation'] == 'deduct'){
            $result = $_POST['number_1'] - $_POST['number_2'];
        } elseif($_POST['operation'] == 'multiply'){
            $result = $_POST['number_1'] * $_POST['number_2'];
        } elseif($_POST['operation'] == 'divide'){
            $result = $_POST['number_1'] / $_POST['number_2'];
        }
    } else {
        $error = "Введите числа, а не строки";
    }
} else {
    $error = "Введите числа";
}
?>
<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>
    <h3>Калькулятор</h3>
    <form action="index.php" method="post">
        <input type="text" required name="number_1" value="<?php echo $_POST['number_1']; ?>">
        <select size="1" name="operation">
            <option value="add">+</option>
            <option value="deduct">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="text" required name="number_2" value="<?php echo $_POST['number_2']; ?>">
        <input type="submit" value="=">
        <input type="text" name="result" value="<?php echo $result; ?>">
    </form>
    <?php echo $error; ?>
</body>
</html>