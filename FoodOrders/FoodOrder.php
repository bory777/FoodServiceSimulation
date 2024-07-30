<?php

namespace FoodOrders;

use Carbon\Carbon;

class FoodOrder {
    /**
     * @var FoodItem[]
     */
    private array $items;
    private Carbon $orderTime;

    public function __construct(array $items = []) {
        $this->items = $items;
        $this->orderTime = Carbon::now();
    }

    /**
     * @return FoodItems[]
     */
    public function getFoodItems(): array {
        return $this->items;
    }

    public function getOrderTime(): Carbon {
        return $this->orderTime;
    }
}