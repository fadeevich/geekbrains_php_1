<?php
    function quadEquation($a, $b, $c){
        $dis = $b ** 2 - 4 * $a * $c;     //дисриминант
        if ($dis > 0){
            return 'x<sub>1</sub> = ' . $x1 = (($b * -1) + sqrt ($dis))/(2 * $a) . '<br>x<sub>2</sub> = ' .$x2 = (($b * -1) - sqrt ($dis))/(2 * $a);
        } elseif ($dis == 0){
            return 'x = ' . $x = ($b * -1)/(2 * $a);
        } else return "действительных корней нет";
    }
echo quadEquation(3, 20, 5);