<?php
class Invoice {
    private float $finalPrice;
    private Carbon $orderTime;
    private Carbon $completionTime;

    public function __construct(float $finalPrice, Carbon $orderTime,int $completionTime) {
        $this->finalPrice = $finalPrice;
        $this->orderTime = $orderTime;
        $this->completionTime = $completionTime;
    }

    public function getFinalPrice(): float {
        return $this->finalPrice;
    }

    public function getOrderTime(): Carbon {
        return $this->orderTime;
    }

    public function getCompletionTime(): int {
        return $this->completionTime;
    }

    public function __toString(): string {
        return "合計金額：{$this->totalPrice}, 注文時刻：{$this->orderTime->format('D M d, Y G:i')}, 完成時刻：{$this->completionTime->format('D M d, Y G:i')}";
    }
}