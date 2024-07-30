<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem {
    const CATEGORY = 'Pizza';

    public function __construct() {
        parent::__construct('HawaiianPizza', 'ハムとパイナップルの美味しいピザです。', 12.99);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}