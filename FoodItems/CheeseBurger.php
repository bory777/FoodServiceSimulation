<?php

namespace FoodItems;

class CheeseBurger extends FoodItem {
    const CATEGORY = 'Burger';

    public function __construct() {
        parent::__construct('CheeseBurger', '美味しいチーズバーガーです。', 10.9);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}