<?php
    function task1() {
        $file = file_get_contents("data.xml");
        $xml = new SimpleXMLElement($file);

        echo '<table>';
        echo '<tr>', '<td>', "Purchase Order Number: ", '</td>';
        echo '<td>', (string)$xml["PurchaseOrderNumber"], '</td>', '</tr>';
        echo '<tr>', '<td>', 'Order Date: ', '</td>';
        echo '<td>', (string)$xml["OrderDate"], '</td>', '</tr>';
        echo '</table>';

        foreach ($xml as $item) {
            switch ($item->getName()) {
                case 'Address':
                    echo '<br>' . '<tr>' . '<td>' . '<i>' . (string)$item->attributes()->Type . '</i>' . '</td>' . '</tr>';
                    echo '<table>';
                    foreach ($item as $element) {
                        echo '<tr>' . '<td>' . $element->getName() . ': ' . '</td>';
                        echo '<td>' . (string)$element . '</td>' . '</tr>';
                    }
                    echo '</table>';
                    break;
                case 'DeliveryNotes':
                    echo '<br>' . 'Delivery Notes: ' . (string)$item . '<br>';
                    break;
                case 'Items':
                    echo '<br>';
                    foreach ($item as $element) {
                        echo '<table>';
                        echo '<tr>' . '<td>' . '<i>' . 'Part Name: ' . '</i>' . $element['PartNumber'] . '</td>' . '</tr>';
                        foreach ($element as $value) {
                            echo '<tr>' . '<td>' . $value->getName() . ': ' . '</td>';
                            echo '<td>' . (string)$value . '</td>' . '</tr>';
                        }
                        echo '</table>';
                        echo '<br>';
                    }
                    break;
            }

        }
        echo '-------------------------------------------------------------------' . '<br>';
    };

    function task2() {
        $arr = [
            'first' => '1',
            'second' => '2',
            'third' => '3',
            'fourth' => '4',
            'fifth' => '5',
            ];
        $arr_enc = json_encode($arr);
        $file = fopen('output.json', 'w+');
        fwrite($file, $arr_enc);

        $arr_load = json_decode(fgets(fopen('output.json', 'r')), true);
        $arr_key = array_flip($arr_load);
        $arr_rand = [];

        for ($i = 0; $i < sizeof($arr_load); $i++) {
            $arr_rand[$i] = rand(1, 5);
        }

        $arr2 = array_combine($arr_key, $arr_rand);
        $arr_enc_2 = json_encode($arr2);
        $file2 = fopen('output2.json', 'w+');
        fwrite($file2, $arr_enc_2);

        $arr_load2 = json_decode(fgets(fopen('output2.json', 'r')), true);
        $result = array_diff_assoc($arr_load, $arr_load2);
        print_r($result);

    };

    function task3() {
        $arr = [];

        for ($i = 0; $i < 50; $i++) {
            $arr[$i] = rand(1, 100);
        }

        $file = fopen('array.csv', 'w+');

        fputcsv($file, $arr);
        fclose($file);

        $csv = fopen('array.csv', 'r');
        $csv_arr = fgetcsv($csv);

        function even($var)
        {
            return(!($var & 1));
        };

        $even_arr = array_filter($csv_arr, "even");
        echo '<br>' . 'Сумма массива равна - ';
        print_r(array_sum($even_arr));
    };

    function task4() {
        $json = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
        $json_file = file_get_contents($json);

        $json_arr = json_decode($json_file, true);
        $result = array_shift($json_arr["query"]["pages"]);
        echo 'ID of page = ' . $result['pageid'] . '<br>';
        echo 'Page title = ' . $result['title'];
    }