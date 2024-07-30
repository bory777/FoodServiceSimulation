<?php
class Customer extends Person {
    /**
     * @var string[]
     */
    private array $interestedCategories;

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
        $menuCategories = array_map(fn(FoodItem $items) => $items::getCategory(), $restaurant->getMenu());
        return array_intersect($this->interestedCategories, $menuCategories);
    }
}