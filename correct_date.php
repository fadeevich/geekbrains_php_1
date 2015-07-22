<?php
    function dateCorrect($day, $month, $year){
        if (($month > 12 or $month <= 0) or $year == 1 or ($day > 31 or $day <= 0)){      // проверка на полный бред
            return "такой даты быть не может";
        } elseif (($month == 1 or $month == 3 or $month == 5 or $month == 7 or $month == 8 or $month == 10 or $month == 12) and $day <= 31){
            return "дата корректна";    //проверка 31 дня в месяцах
        } elseif (($month == 4 or $month == 6 or $month == 9 or $month == 11) and $day <= 30){
            return "дата корректна";    //проверка 30 дней в месяцах
        } elseif ($month == 2 and ($year % 4 == 0 and $year % 100 != 0 or $year % 400 == 0) and $day <= 29){
            return "дата корректна";    //проверка високосного года
        } elseif($month == 2 and $year % 4 != 0 and $day <= 28){
            return "дата корректна";    //проверка не високосного года
        } else {
            return "такой даты быть не может";
        }
    }
echo dateCorrect(29, 2, 1996); //верно, год високосный, т.к кратен 4
echo '<br>';
echo dateCorrect(29, 2, 1997); //не верно, год не високосный, т.к. не кратен 4
echo '<br>';
echo dateCorrect(29, 2, 2000); //верно, год високосный, т.к кратен 400
echo '<br>';
echo dateCorrect(29, 2, 2100); // не верно, год не високосный, т.к. кратен 100 и не кратен 400
echo '<br>';
echo dateCorrect(0, 2, 2100); // не верно, нулевого дня не может быть (так же как и нулевого месяца и года)
echo '<br>';
echo dateCorrect(29, 13, 2006);//не верно, тринадцатого месяца не существует
echo '<br>';
echo dateCorrect(31, 4, 2100); //не верно, в апреле 30 дней