<?php

namespace Persons\Employees;

use FoodOrders\FoodOrder;
use Invoices\Invoice;
use FoodItems\FoodItem;
use Carbon\Carbon;

class Cashier extends Employee {
    public function __construct(string $name, int $age, string $address) {
        parent::__construct($name, $age, $address, 'Cashier');
    }

    /**
     * @param FoodItem[]
     */
    public function createOrder(array $items): FoodOrder {
        echo $this->action("オーダーを取ってきました。");
        return new FoodOrder($items);
    }

    public function generateInvoice(FoodOrder $order, Chef $chef): Invoice {
        $orderTime = Carbon::now();
        $completionTime = $orderTime->copy()->addMinutes(30);
        $totalPrice = array_reduce($order->getFoodItems(), fn($carry, FoodItem $item) => $carry + $item->getPrice(), 0);

        echo $chef->prepareOrder($order);
        echo $this->action("請求書を作成しました。");

        return new Invoice($totalPrice, $orderTime, $completionTime);
    }
}