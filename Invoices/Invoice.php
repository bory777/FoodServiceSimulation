<?php

namespace Invoices;

use Carbon\Carbon;

class Invoice {
    private float $price;
    private Carbon $orderTime;
    private Carbon $completionTime;

    public function __construct(float $price, Carbon $orderTime, Carbon $completionTime) {
        $this->price = $price;
        $this->orderTime = $orderTime;
        $this->completionTime = $completionTime;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getOrderTime(): Carbon {
        return $this->orderTime;
    }

    public function getCompletionTime(): int {
        return $this->completionTime;
    }

    public function __toString(): string {
        return "金額：{$this->price}, 注文時刻：{$this->orderTime->format('D M d, Y G:i')}, 提供時刻：{$this->completionTime->format('D M d, Y G:i')}" . PHP_EOL;
    }
}