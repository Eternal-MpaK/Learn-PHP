<?php
    require_once("functions.php");

    $distance = 250;
    $speed = 10;
    $transmission = ['auto', 'manual'];
    $radio = [1, 2, 3];
    $car = new Car($distance, $speed, $way, $transmission[0], $radio[2]);
    echo $car->engineStart() . '<br>';
    echo $car->startMove() . '<br>';
    echo $car->moving($speed, $distance) . '<br>';
    echo $car->engineStop() . '<br>';