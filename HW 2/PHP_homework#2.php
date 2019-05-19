<?php
    require "functions.php";

    $arr = [Раз, Два, Три, Четыре, Пять];
    $flag = FALSE;
    $flag2 = TRUE;

    echo task1($arr, $flag) . '<br>';
    echo task1($arr, $flag2) . '<br><br>';

    $num_arr = [2, 6, 21, 8, 5];
    $arg = '+';

    echo task2($num_arr, $arg) . '<br><br>';

    echo task3('+', 1, 3, 16, 21.5, 43) . '<br><br>';

    echo task4(10, 10) . '<br>';

    $Palindrome = task5('Я иду с мечем судия');
    task5_2($Palindrome);
    echo '<br><br><br>';
    task6();
    task7();
    task8();
    task9();
echo '<br><br><br>';
