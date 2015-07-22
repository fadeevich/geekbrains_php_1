<!-- напишите функцию, кторая принимате на вход два аргумента - число (1..31) и номер месяца (1..12) и возвращает правильно сформированную дату на русском языке. -->
<?php
    function dateRus($day, $month){
        if ($month > 12 or $month <= 0){
            return "не корректный месяц";
        }
        switch($month){
            case 1:
                return $day . " января";
                break;
            case 2:
                return $day . " февраля";
                break;
            case 3:
                return $day . " марта";
                break;
            case 4:
                return $day . " апреля";
                break;
            case 5:
                return $day . " мая";
                break;
            case 6:
                return $day . " июня";
                break;
            case 7:
                return $day . " июля";
                break;
            case 8:
                return $day . " августа";
                break;
            case 9:
                return $day . " сентября";
                break;
            case 10:
                return $day . " октября";
                break;
            case 11:
                return $day . " ноября";
                break;
            case 12:
                return $day . " декабря";
                break;
        }
    }

    echo dateRus(30, 14);