<?php

namespace FoodItems;

class Fettuccine extends FoodItem {
    const CATEGORY = 'Fettuccine';

    public function __construct() {
        parent::__construct('Fettuccine', '肉やキノコと使った濃厚なソースとの組み合わせがおすすめです。', 11.99);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}