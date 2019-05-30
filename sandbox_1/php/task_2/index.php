<?php
function init_task_2() {
    $population = array();
    $population["Нью-Йорк"]["Нью-Йорк"]         = 8175133;
    $population["Калифорния"]["Лос-Анджелес"]   = 3792621;
    $population["Иллинойс"]["Чикаго"]           = 2695598;
    $population["Техас"]["Хьюстон"]             = 2100263;
    $population["Пенсильвания"]["Филадельфия"]  = 1526006;
    $population["Аризона"]["Феникс"]            = 1445632;
    $population["Техас"]["Сан-Антонио"]         = 1327407;
    $population["Калифорния"]["Сан-Диего"]      = 1307402;
    $population["Техас"]["Даллас"]              = 1197816;
    $population["Калифорния"]["Сан-Хосе"]       = 945942;



    print(mk_table($population));
}

function mk_table(array $arr) {
    ksort($arr);

    $table_header   = "<table class='table_task table_task_2'>"
                    . "<row><th>Штаты</th><th>Город</th><th>Популяция</th></row>";
    $table_body     = "<tr>";
    $table_footer   = "";
    $state_arr      = [];

    foreach ($arr as $state => $data) {
        $spec_prop              = '';
        $state_population       = 0;
        if (is_array($data)) {
            ksort($data);

            $data_len           = count($data);
            $spec_prop          = ($data_len > 1) ? "rowspan=\"$data_len\"" : "";
            $table_body         .= "<td $spec_prop>$state</td>";
            $state_arr[$state]  = 0;

            foreach ($data as $city => $qnty) {
                $city_population    = format_number($qnty);
                $state_arr[$state]  += $qnty;
                $table_body         .= "<td>$city</td><td>$city_population</td>"
                                    . "</tr><tr>";
            }

            $state_population       = format_number($state_arr[$state]);
            $table_footer           .= "<td colspan=\"2\" class='right indicate'>"
                                    . "$state всего населения:</td>"
                                    ."<td>$state_population</td></tr><tr>";
        }
    }

    $total_population   = format_number(array_sum($state_arr));
    $table_footer       .= "<td colspan=\"2\" class='right indicate'>Всего населения: </td>"
                        . "<td>$total_population</td></tr></table>";

    return $table_header . $table_body . $table_footer;
}

function format_number($num, $dec=0, $point=".", $separ=" ") {
    return number_format($num, $dec, $point, $separ);
}