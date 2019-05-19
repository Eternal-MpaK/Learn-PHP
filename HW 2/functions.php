<?php
function task1($arr, $flag) {
    if ($flag == TRUE) {
        $str = implode(' ', $arr);
        return $str;
    } else {
        $arr_count = sizeof($arr);
        for ($i = 0; $i <= $arr_count; $i++) {
            echo '<p>' . $arr[$i] . '</p>';
        }
    };
};

function task2($num_arr, $sign){
    if(is_array($num_arr)){
        switch ($sign) {
            case '+':
                echo $num_arr[0];
                $sum = $num_arr[0];

                for ($value = 1; $value < count($num_arr); $value++){
                    echo " + " . $num_arr[$value];
                    $sum += $num_arr[$value];
                }

                echo " = " . $sum;
                break;


            case '-':
                echo $num_arr[0];
                $sum = $num_arr[0];

                for ($value = 1; $value < count($num_arr); $value++){
                    echo " - " . $num_arr[$value];
                    $sum -= $num_arr[$value];
                }

                echo " = " . $sum;
                break;


            case '*':
                echo $num_arr[0];
                $sum = $num_arr[0];

                for ($value = 1; $value < count($num_arr); $value++){
                    echo " * " . $num_arr[$value];
                    $sum *= $num_arr[$value];
                }

                echo " = " . $sum;
                break;


            case '/':
                echo $num_arr[0];
                $sum = $num_arr[0];

                for ($value = 1; $value < count($num_arr); $value++){
                    echo " / " . $num_arr[$value];
                    $sum /= $num_arr[$value];
                }

                echo " = " . $sum;
                break;

            default:
                echo "Неверный знак";
                break;
        }
    }
};

function task3($sign){
    $numbers = array();

    for ($i = 1; $i < func_num_args(); $i++){
        $numbers[] = func_get_arg($i);
    }

    if (is_array($numbers)){
        task2($numbers, $sign);
    }
};

function task4($rows, $cols) {
    if (is_int($rows)&&($cols) ) {
        echo '<table border="1">';
        for ($tr = 1; $tr <= $rows; $tr++) {
            echo '<tr>';

            for ($td = 1; $td <= $cols; $td++) {
                echo '<td>' . $tr * $td . '</td>';
            }
            echo '</tr>';
        };
    } else {
        echo 'Некорректный формат, используйте целые числа';
    };
}

function mb_strrev($str){
    preg_match_all('/./us', $str, $ar);
    return implode('',array_reverse($ar[0]));
};

function task5($string) {
    $string = mb_strtolower($string);
    $string = str_replace(' ', '', $string);
    $string_rev = mb_strrev($string);
    if ($string == $string_rev) {
        return TRUE;
    } else {
        return FALSE;
    }

}

function task5_2($func) {
    if ($func == TRUE) {
        echo 'Данный текст - палиндром';
    } else {
        echo 'Данный текст - не палиндром';
    }
};

function task6() {
    echo 'Текущее дата и время: ' . date('d.m.y H:i', time()) . '<br>';
    echo 'Дата и время 24.02.2016 00:00:00 в UNIX = ' . mktime(0, 0, 0, 2, 24, 2016) . '<br><br>';
};

function task7() {
    $patter = 'Карл у Клары украл Кораллы';
    $cut_patter = str_replace('К', '', $patter);
    echo $cut_patter . '<br>';
    $bottles = 'Две бутылки лимонада';
    $more_bottles = str_replace('Две', 'Три', $bottles);
    echo $more_bottles;
};

function task8() {
    $file = file_get_contents('./text.txt');
    echo '<br>' . $file;
};

function task9() {
    $file2 = fopen('anothertest.txt','w+');
    $str = 'Hell\'o again!';
    fwrite($file2, $str);
}