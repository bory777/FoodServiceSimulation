<?php

namespace Restaurants;

use FoodItems\FoodItem;
use Persons\Employees\Employee;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;
use Invoices\Invoice;
use Exception;

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
     * @return FoodItem[]
     */
    public function getMenu(): array {
        return $this->menu;
    }

    /**
     * @return Employee[]
     */
    public function getEmployees(): array {
        return $this->employees;
    }

    public function getEmployeeByRole(string $role): ?Employee {
        foreach($this->employees as $employee) {
            if ($employee instanceof $role) {
                return $employee;
            }
        }
        return null;
    }

    public function order(string $category): Invoice {
        $foodItems = array_filter($this->menu, fn(FoodItem $item) => $item::getCategory() === $category);

        if (empty($foodItems)) {
            throw new Exception("{$category}というカテゴリーのメニューはありません。");
        }

        $cashier = $this->getEmployeeByRole(Cashier::class);
        $chef = $this->getEmployeeByRole(Chef::class);

        $order = $cashier->createOrder($foodItems);
        return $cashier->generateInvoice($order, $chef);
    }
}