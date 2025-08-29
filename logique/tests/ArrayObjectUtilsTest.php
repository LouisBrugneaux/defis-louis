<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Service\ArrayObjectUtils;

$u = new ArrayObjectUtils();

// filterByProperty
$users = [
    ["id" => 1, "name" => "Alice", "age" => 25, "active" => true],
    ["id" => 2, "name" => "Bob", "age" => 30, "active" => false],
    ["id" => 3, "name" => "Charlie", "age" => 35, "active" => true],
];
echo "[filterByProperty] -> ", json_encode($u->filterByProperty($users, "active", true)), PHP_EOL;

// groupBy
$products = [
    ["id" => 1, "name" => "Laptop", "category" => "Electronics", "price" => 999],
    ["id" => 2, "name" => "Smartphone", "category" => "Electronics", "price" => 699],
    ["id" => 3, "name" => "T-shirt", "category" => "Clothing", "price" => 29],
];
echo "[groupBy] -> ", json_encode($u->groupBy($products, "category")), PHP_EOL;

// findIntersection
$library1  = [
    ["id" => 1, "title" => "1984", "author" => "Orwell", "available" => true],
    ["id" => 2, "title" => "Dune", "author" => "Herbert", "available" => false],
];
$library2 = [
    ["id" => 3, "title" => "1984", "author" => "Orwell", "available" => true],
    ["id" => 4, "title" => "Foundation", "author" => "Asimov", "available" => true],
];
echo "[findIntersection] -> ", json_encode($u->findIntersection($library1 , $library2, "title")), PHP_EOL;

// transformArray
$employees = [
    ["id" => 1, "firstName" => "John", "lastName" => "Doe", "salary" => 50000],
    ["id" => 2, "firstName" => "Jane", "lastName" => "Smith", "salary" => 60000]
];
$transformer = function($emp) {
    return [
        "id" => $emp["id"],
        "fullName" => $emp["firstName"] . " " . $emp["lastName"],
        "annualSalary" => $emp["salary"] * 12
    ];
};
echo "[transformArray] -> ", json_encode($u->transformArray($employees,$transformer)), PHP_EOL;

// aggregateData
$transactions = [
    ["id" => 1, "type" => "debit", "amount" => 100, "category" => "Food"],
    ["id" => 2, "type" => "debit", "amount" => 50, "category" => "Food"],
    ["id" => 3, "type" => "credit", "amount" => 75, "category" => "Income"],
];
echo "[aggregateData] -> ", json_encode($u->aggregateData($transactions, "category", "amount")), PHP_EOL;
