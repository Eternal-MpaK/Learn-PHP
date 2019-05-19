<?php
	// Задание №1
		// $name = Kirill;
		// $age = 29;

		// echo "Меня зовут $name<br>";
		// echo "Мне $age<br>";
		// echo "\" \" ' \\ !";

	// Задание №2
		// $pictures = 80;
		// $markers = 23;
		// $pencils = 40;
		// $paints = $pictures - ($markers + $pencils);

		// echo "На школьной выставке $pictures рисунков.<br> $markers из них выполнены фломастерами, <br>$pencils карандашами, а остальные — красками. <br>Сколько рисунков, выполненные красками,<br> на школьной выставке?<br> <br>";
		// echo "Ответ: $paints";

	// Задание №3
		// define(age, 29);

		// if (defined("age") == true) echo "Константа age на месте<br>";
		// echo age;

	// Задание №4
		// $age = 29;
		// if ($age <= 65 && $age >= 18) {
		// 	echo "Вам еще работатить и работать";
		// } elseif ($age < 18 && $age >= 0) {
		// 	echo "Вам еще рано работать";
		// } elseif ($age <= 0) {
		// 	echo "Неизвестный возраст";
		// } else {
		// 	echo "Вам пора на пенсию";
		// };

	 Задание №5
		 $day = 4;
		 switch ($day) {
		 	case 1:
		 	case 2:
		 	case 3:
		 	case 4:
		 	case 5:
		 		echo "Это рабочий день";
		 		break;

		 	case 6:
		 	case 7:
		 		echo "Это выходной день";
		 		break;

		 	default:
		 		echo "Неизвестный день";
		 		break;
		 }

	// Задание №6
		// $bmw = [
		// 	"model" => "X5",
		// 	"speed" => "120",
		// 	"doors" => "5",
		// 	"year" => "2015",

		// ];

		// $toyota = [
		// 	"model" => "Supra",
		// 	"speed" => "140",
		// 	"doors" => "4",
		// 	"year" => "2014",

		// ];

		// $opel = [
		// 	"model" => "Corsa",
		// 	"speed" => "160",
		// 	"doors" => "2",
		// 	"year" => "2017",

		// ];

		// $cars = [
		// 	"bmw" => $bmw,
		// 	"toyota" => $toyota,
		// 	"opel" => $opel,
		// ];


		// // print_r($cars);
		// echo "CAR bmw<br>";
		// echo $cars[bmw][model], ' ';
		// echo $cars[bmw][speed], ' ';
		// echo $cars[bmw][doors], ' ';
		// echo $cars[bmw][year], ' ';

		// echo "<br><br>CAR toyota<br>";
		// echo $cars[toyota][model], ' ';
		// echo $cars[toyota][speed], ' ';
		// echo $cars[toyota][doors], ' ';
		// echo $cars[toyota][year], ' ';

		// echo "<br><br>CAR opel<br>";
		// echo $cars[opel][model], ' ';
		// echo $cars[opel][speed], ' ';
		// echo $cars[opel][doors], ' ';
		// echo $cars[opel][year], ' ';

	// Задание №7
	// 	$rows = 9;
	// 	$cols = 9;

	// 	echo '<table border="1">';

	// 	for ($tr = 1; $tr <= $rows; $tr++) {
	// 		echo '<tr>';
		
	// 		for ($td=1; $td <= $cols; $td++) { 
	// 			echo '<td>'. $tr * $td. '</td>';
	// 		}
	// 		echo '</tr>';
	// 	};

	// echo '</table>';

	// Задание №8
		// $str = 'Крокодил шел мимо';
		// echo $str, "<br>";

		// $arr = explode(' ', $str);
		// echo "$arr[0] ";
		// echo "$arr[1] ";
		// echo "$arr[2]<br>";

		// $reversed=[];
		// $i = count($arr);

		// while ($i>0) {
		// 	$i--;
		// 	$reversed[]=$arr[$i];
		// }

		// print_r($reversed);
		// $str = implode('|', $reversed);
		// echo "<br>";
		// echo $str;

?>