<?php

namespace Persons\Employees;

use FoodOrders\FoodOrder;

class Chef extends Employee {
    public function __construct(string $name, int $age, string $address) {
        parent::__construct($name, $age, $address, 'Chef');
    }

    public function prepareOrder(FoodOrder $order): void {
        foreach($order->getFoodItems() as $item) {
            echo $this->action("{$item->getName()}を作りました。{$item->getDescription()}");
        }
    }
}
