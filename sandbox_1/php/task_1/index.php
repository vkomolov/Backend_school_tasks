<?php
    function init_task_1() {
        require_once('classes.php');
        require_once('dishes.php');

        $chosen_arr = array();
        $dishes_arr = get_dishesArr();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($_POST as $input => $value) {
                if ($input !== "submit") {
                    $valid_value = validate_input($value);

                    for($i = 0; $i < count($dishes_arr); $i++) {
                        if($dishes_arr[$i]["product_name"] === $input
                            && $dishes_arr[$i]["product_id"] === $valid_value)
                        {
                            $chosen_arr[$i] = $dishes_arr[$i];

                            if(array_key_exists($input."_qnty", $_POST)) {
                                $chosen_arr[$i]["qnty"] = $_POST[$input."_qnty"];
                            }
                        }
                    }
                }
            }

            $cart = new Cart();

            if (count($chosen_arr)) {
                foreach ($chosen_arr as $item) {
                    $cart -> add_item(new Dish($item));
                }
            }

            return $cart -> mk_table_calc();
        }
    }

function validate_input($input) {
    $data = trim($input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
