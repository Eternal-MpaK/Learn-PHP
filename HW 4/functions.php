<?php

interface carInterface
{
    public function moving($speed, $distance);
}


class car implements carInterface {

    public $distance;
    public $speed;
    public $transmission;
    public $chosenStation;
    use engine, autoTransm, manualTransm, radio;

    public function __construct($distance, $speed, $way, $transmission, $chosenStation)
    {
        $this->distance = $distance;
        $this->speed = $speed;
        $this->transmission = $transmission;
        $this->chosenStation = $chosenStation;
        echo "Расстояние - " . $this->distance;
        echo "<br>", "Скорость - " . $this->speed;
        echo "<br>", "Коробка передач - " . $this->transmission;
        echo "<br>", $this->radioStation($chosenStation);
    }

    public function engineStart()
    {
        $this->on();
    }

    public function startMove()
    {
        if ($this->transmission == 'auto') {
            $this->forwardAuto();
        } elseif ($this->transmission == 'manual') {
            $this->manualTransm($this->speed);
        }
    }

    public function moving($speed, $distance) {

        $i = 0;
        $t = 0;
        do {
            $i += $speed; $t += ($speed * 0.5);
            if ($i >= $distance) {
                echo '<br>' . 'Дистанция ' . $i . '. Достигнут пункт назначения';
            } else {
                if ($t == 90) {
                    echo 'Дистанция ' . $i . ', температура ' . $t . 'с°. ' . '<br>';
                    echo 'Включено охлаждение';
                    $t = $t - 10;
                    echo "<br>";
                } else {
                    echo 'Дистанция ' . $i . ', температура ' . $t . 'с°. ' .  '<br>';
                }
            }
        } while ($i < $distance);
    }

    public function engineStop()
    {
        $this->off();
    }


}

trait engine {

    public $horsePower;
    public $speed;


    public function on() {
        echo '<br>' . 'Двигатель включен.';
    }

    public function off()
    {
        echo '<br>' . 'Двигатель выключен.';
    }

    public function coolAct($t){
        echo '<br>' . 'Охлаждение двигателя включено';
        return $t - 10;
    }
}

trait autoTransm {

    public function forwardAuto() {
        echo '<br>' . 'Коробка передач: вперед.';
    }

    public function backwardAuto() {
        echo '<br>' . 'Коробка передач: назад.';
    }
}

trait manualTransm {

    public function forwardManual($speed) {
        if ($speed <= 20) {
            echo '<br>' . 'Ручная кородка передач: первая передача';
        } else {
            echo '<br>' . 'Ручная кородка передач: вторая передача';
        }
    }
}

trait radio {

    public function radioStation($chosenStation) {
        switch ($chosenStation) {
            case 1:
                echo 'Радио - выбрана станция: Дорожное радио';
                break;

            case 2:
                echo 'Радио - выбрана станция: Hit-FM';
                break;

            case 3:
                echo 'Радио - выбрана станция: Europe+';
                break;

            default:
                echo 'Радио - станция не выбрана';
                break;
        }
    }
}