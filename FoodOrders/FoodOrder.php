<?php
class FoodOrder {
    /**
     * @var FoodItem[]
     */
    private array $items;
    private Carbon $orderTime;

    public function __construct(array $items = [], Carbon $orderTime) {
        $this->item = $items;
        $this->orderTime = Carbon::now();
    }

    /**
     * @return FoodItems[]
     */
    public function getFoodItems(): array {
        return $this->$items;
    }

    public function getOrderTime(): Carbon {
        return $this->$orderTime;
    }
}