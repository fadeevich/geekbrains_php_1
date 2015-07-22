<?php
    function deposit($sum, $months, $year_percent){
        return $sum + (($sum * $year_percent * $months) / (12 * 100));
    }
    function depositWithCapital($sum, $months, $year_percent){
        return $sum * (1 + ($year_percent / (100 * 12))) ** $months;
    }

    $sum = 5000;                                  //сумма вклада
    $months = 6;                                  //срок в месяцах
    $year_percent = 9;                            //годовой процент
    $r = deposit($sum, $months, $year_percent);   //сумма вклада по окончанию срока
    $r2 = depositWithCapital($sum, $months, $year_percent);//сумма вклада по окончанию срока с капитализацией процентов

    echo "Первоначальная сумма вклада: $sum<br>Срок в месяцах: $months<br>
    Годовой процент: $year_percent<br>Итоговая сумма вклада: $r<br>
    Итоговая сумма вклада с капитализацией процентов: $r2";