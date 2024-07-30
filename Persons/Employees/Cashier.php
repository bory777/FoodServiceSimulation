<?php
class Cashier extends Employee {
    public function __construct(string $name, int $age, string $address) {
        parent::__construct($name, $age, $address, 'Cashier');
    }

    /**
     * @param FoodItem[]
     */
    public function createOrder(array $items): FoodOrder {
        echo $this->action("オーダーを取ってきました。") . PHP_EOL;
        return new FoodOrder($items);
    }

    public function generateInvoice(FoodOrder $order, Chef $chef): Invoice {
        $orderTime = Carbon::now();
        $completionTime = $orderTime->copy()->addMinutes(30);
        $totalPrice = array_reduce($order->getItems(), fn($carry, FoodItem $item) => $carry + $item->getPrice(), 0);

        echo $this->action("請求書を作成しました。");
        echo $chef->action(implode(", ", array_map(fn(FoodItem $item) => $item->getName(), $order->getItems()))) . PHP_EOL;

        return new Invoice($totalPrice, $orderTime, $completionTime);
    }
}