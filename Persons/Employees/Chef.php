<?php
class Chef extends Employee {
    public function __construct(string $name, int $age, string $address) {
        parent::__construct($name, $age, $address, "Chef");
    }

    public function prepareOrder(FoodOrder $order): void {
        $item = implode(",", array_map(fn(FoodItem $item) => $item->getName(), $order->getItems()));
        echo $this->action("{$item}が出来上がりました。") . PHP_EOL;
    }
}