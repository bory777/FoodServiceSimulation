<?php

require 'vendor/autoload.php';

use Carbon\Carbon;
use Restaurants\Restaurant;
use FoodItems\HawaiianPizza;
use FoodItems\CheeseBurger;
use FoodItems\Fettuccine;
use FoodItems\Spaghetti;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;
use Persons\Customers\Customer;

$restaurant = new Restaurant();
$restaurant->addMenuItem(new HawaiianPizza());
$restaurant->addMenuItem(new CheeseBurger());
$restaurant->addMenuItem(new Fettuccine());
$restaurant->addMenuItem(new Spaghetti());
$restaurant->addEmployee(new Cashier('John', 30, '123 Cashier St'));
$restaurant->addEmployee(new Chef('William', 40, '456 Chef St'));

$customer = new Customer('Alice', 30, '123 Main St', ['Pizza', 'Burger', 'Pasta', 'Fettuccine']);
$interestedCategories = $customer->interestedCategories($restaurant);

echo "いらっしゃいませ。{$customer->getName()}様。" . PHP_EOL;
echo "ご注文は" . implode(',', $interestedCategories) . "で承りました。少々お待ちください。" . PHP_EOL;
echo PHP_EOL;

foreach ($interestedCategories as $category) {
    $invoice = $restaurant->order($category);
    echo $invoice . PHP_EOL;
    $customer->addFinalPrice($invoice);
}

echo "合計金額：" . $customer->getFinalPrice() . "ドル" . PHP_EOL;
