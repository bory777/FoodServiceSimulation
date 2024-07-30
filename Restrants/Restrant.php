<?php
class Restaurant {
    /** @var FoodItem[] */
    private array $menu;

    /** @var Employee[] */
    private array $employees;

    public function __construct(array $menu = [], array $employees = []) {
        $this->menu = $menu;
        $this->employees = $employees;
    }

    public function addMenuItem(FoodItem $item): void {
        $this->menu[] = $item;
    }

    public function addEmployee(Employee $employee): void {
        $this->employees[] = $employee;
    }

    /**
     * @return Employee[]
     */
    public function getEmployees(): array {
        return $this->employees;
    }

    public function getEmployeeByRole(string $role): ?Emplayee {
        foreach($this->employees as $employee) {
            if ($employee instanceof $role) {
                return $employee;
            }
        }
        return null;
    }

    /**
     * @param string[]
     */
    public function order(array $categories): Invoice {
        $foodItem = array_filter($this->menu, fn(FoodItem $items) => $items::getCategory() === $categories);

        if (empty($foodItem)) {
            throw new Exception("{$categories}というカテゴリーのメニューはありません。");
        }

        $cashier = $this->getEmployeeByRole(Cashier::class);
        $chef = $this->getEmployeeByRole(Chef::class);

        $order = $cashier->createOrder($foodItems);
        return $cashier->generateInvoice($order, $chef);
    }
}