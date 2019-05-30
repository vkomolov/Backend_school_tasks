<?php
function get_dishesArr() {
    $dishesArr =
        [
            array(
                "product_name" => "hamburger",
                "product_id" => "011",
                "descr" => "Hamburger with pork",
                "price" => 4.95,
                "photo" => "photo url"
            ),
            array(
                "product_name" => "shake",
                "product_id" => "022",
                "descr"=>"Shake with Chocolate Milk",
                "price"=>1.95,
                "photo"=>"photo url"
            ),
            array(
                "product_name" => "coca-cola",
                "product_id" => "033",
                "descr"=>"Coca-cola with ice",
                "price"=>0.85,
                "photo"=>"photo url"
            )
        ];

    return $dishesArr;
}