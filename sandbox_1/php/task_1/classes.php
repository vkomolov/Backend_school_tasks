<?php

abstract class Object {
    public function initProp($prop, $val=null) {
        try {
            if (property_exists($this, $prop)) {
                if ($val) {
                    $this -> $prop = $val;
                }
                else {
                    return $this -> $prop;
                }
            }
            else throw new Exception("no prop in the object");
        } catch (Exception $e) {
            echo "<div class=\"alert_block\">
                    <span>
                        {$e -> getMessage()}
                    </span>
                  </div>";
        }
    }
}

abstract class Product extends Object {
    protected $id;
    protected $descr;
    protected $price;
    protected $photo;
    protected $qnty;

    function __construct(array $item_props) {
        foreach ($item_props as $prop => $value) {
            $this -> $prop = $value;
        }
    }
}

class Dish extends Product {
    function __construct(array $item_props)
    {
        parent::__construct($item_props);
    }
}

class Cart extends Object {
    protected $chosenArr = []; //chosen items (extended from Dish)
    protected $avt = 7.5; //Added Value Tax (%)
    protected $tips = 16; //Tips (%)

    public function add_item(object $item) {
        try {
            if ($item instanceof Dish) {
                $this -> chosenArr[] = $item;
            }
            else {
                throw new Exception("the given argument does not inherit the Class in need");
            }
        } catch (Exception $e) {
            echo "<div class=\"alert_block\">
                    <span>
                        {$e -> getMessage()}
                    </span>
                  </div>";
        }
    }

    public function list_items() {
        if (count($this -> chosenArr)) {
            $items_list = array();

            foreach ($this->chosenArr as $item) {
                $items_list[] = $item -> initProp("descr");
            }

            return $items_list;
        } else {
            return 0;
        }
    }

    public function count_items() {
        return count($this -> chosenArr);
    }

    public function calc_items() {
        $calc_data = new stdClass();
        if(count($this -> chosenArr)) {
            $calc_data -> sum = 0;
            $calc_data -> avt_sum = 0;
            $calc_data -> tips_sum = 0;

            foreach ($this -> chosenArr as $item) {
                $item_price = $item -> initProp("price");
                $item_qnty = $item -> initProp("qnty");
                $calc_data -> sum += $item_price * $item_qnty;
            }

            if ($calc_data -> sum) {
                $avt = $this -> initProp("avt");
                $tips = $this -> initProp("tips");
                $calc_data -> avt_sum = ($calc_data -> sum / 100) * $avt;
                $calc_data -> tips_sum = (($calc_data -> sum + $calc_data -> avt_sum) / 100) * $tips;
            } else {
                return 0;
            }

            return $calc_data;

        } else {
            return 0;
        }
    }

    public function mk_table_calc() {
        if (count($this -> chosenArr)) {
            $table_head = "<table class=\"table_task table_task_1\">"
                            ."<tr><th>Chosen Dish</th>"
                            ."<th>Qnty</th><th>Price</th><th>Sum</th></tr>";
            $table_body = "";
            $table_footer = "";
            $total = $this -> calc_items();
            $total_sum = $total -> sum;
            $total_avt = $total -> avt_sum;
            $total_tips = $total -> tips_sum;
            $total_overall = $total_sum + $total_avt + $total_tips;

            foreach ($this -> chosenArr as $item) {
                $descr = $item -> initProp('descr');
                $qnty = $item -> initProp('qnty');
                $price = $item -> initProp('price');
                $sum = $price * $qnty;

                $table_body .= "<tr><td>$descr</td>"
                            ."<td>$qnty</td><td>" . form_num($price) . "</td>"
                            ."<td>" . form_num($sum) . "</td></tr>";
            }

            $table_footer = "<tr class=\"indicate\"><td colspan='3' class='right'>Total (UAH)</td>"
                            ."<td>" . form_num($total_sum) . "</td></tr>"
                            ."<tr class=\"indicate\"><td colspan='3' class='right'>AVT (7.5%)</td>"
                            ."<td>" . form_num($total_avt) . "</td></tr>"
                            ."<tr class=\"indicate\"><td colspan='3' class='right'>TIPS (16%)</td>"
                            ."<td>" . form_num($total_tips) . "</td></tr>"
                            ."<tr class=\"indicate\"><td colspan='3' class='right'>Overall Total (UAH)</td>"
                            ."<td>" . form_num($total_overall) . "</td></tr>"
                            ."</table>";

            return $table_head . $table_body . $table_footer;

        } else {
            return "<div class='flex-box center'><span>No chosen Dishes</span></div>";
        }
    }
}

function form_num(float $num, int $dec=2) {
    return number_format($num, $dec, ".", " ");
}