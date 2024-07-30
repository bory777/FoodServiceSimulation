<?php

namespace FoodItems;

class Spaghetti extends FoodItem {
    const CATEGORY = 'Pasta';

    public function __construct() {
        parent::__construct('Spaghetti', 'トマトソースの美味しいイタリアンスパゲッティです。', 10.99);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}