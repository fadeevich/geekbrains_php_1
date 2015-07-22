<?php
    function fib($n){
        if ($n == 0) {
            return 0;
        } elseif ($n == 1) {
            return 1;
        } elseif ($n >= 2) {
            return (fib($n-1)+fib($n-2));
        } else {
            return (fib($n+2)-fib($n+1));
        }
    }

    $n=15;          //номер числа Фибоначчи
    $r=fib($n);     //число Фибоначчи
    echo "n = $n ; F(n) = $r";