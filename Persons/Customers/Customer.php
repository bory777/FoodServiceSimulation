<?php

namespace Persons\Customers;

use Persons\Person;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person {
    /**
     * @var string[]
     */
    private array $interestedCategories;
    private float $finalPrice = 0.0;

    public function __construct(string $name, int $age, string $address, array $interestedCategories) {
        parent::__construct($name, $age, $address);
        $this->interestedCategories = $interestedCategories;
    }

    /**
     * @return string[]
     */
    public function getInterestedCategories(): array {
        return $this->interestedCategories;
    }

    /**
     * @return string[]
     */
    public function interestedCategories(Restaurant $restaurant): array {
        $menuCategories = array_map(fn($items) => $items::getCategory(), $restaurant->getMenu());
        return array_intersect($this->interestedCategories, $menuCategories);
    }

    public function addFinalPrice(Invoice $invoice): void {
        $this->finalPrice += $invoice->getPrice();
    }

    public function getFinalPrice(): float {
        return $this->finalPrice;
    }
}