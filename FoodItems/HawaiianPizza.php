<?php
class HawaiianPizza extends FoodItems {
    const CATEGORY = 'Pizza';

    public function __construct() {
        parent::__constrict('HawaiianPizza', 'ハムとパイナップルの美味しいピザです。', 12.99);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}