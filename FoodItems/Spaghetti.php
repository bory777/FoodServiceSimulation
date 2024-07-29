<?php
class Spaghetti extends FoodItem {
    public function __construct() {
        parent::__construct('spaghetti', 'トマトソースの美味しいイタリアンスパゲッティです。', 10.99);
    }

    public static function getCategory(): string {
        return self::CATEGORY;
    }
}