<?php
require __DIR__ . '/../vendor/autoload.php';


use App\Service\ObjectUtils;

$u = new ObjectUtils();

// objectValues
$scores = [
    "level1" => 100,
    "level2" => 85,
    "level3" => 95
];
echo "[objectValues] -> ", json_encode($u->objectValues($scores)), PHP_EOL;

// transformValues
$pricesInEuros = [
    "book" => 20,
    "pen" => 5,
    "notebook" => 10
];
echo "[transformValues] -> ", json_encode($u->transformValues($pricesInEuros, fn($euros) => $euros * 1.1)), PHP_EOL;

// mergeObjects
$store1Sales = [
    "january" => 1000,
    "february" => 1200,
    "march" => 900
];
$store2Sales = [
    "january" => 800,
    "february" => 950,
    "march" => 1100
];
echo "[mergeObjects] -> ", json_encode($u->mergeObjects($store1Sales, $store2Sales)), PHP_EOL;

// filterObject
$inventory = [
    "laptop" => 0,
    "smartphone" => 5,
    "tablet" => 0,
    "headphones" => 8
];
echo "[filterObject] -> ", json_encode($u->filterObject($inventory, fn($stock) => $stock === 0)), PHP_EOL;

// findKeysByValue
$productStock = [
    "laptop" => 0,
    "mouse" => 5,
    "keyboard" => 0,
    "monitor" => 3
];
echo "[findKeysByValue] -> ", json_encode($u->findKeysByValue($productStock, 0)), PHP_EOL;

// createObjectFromArrays
$playerNames = ["Alice", "Bob", "Charlie"];
$scores = [100, 85, 90];
echo "[createObjectFromArrays] -> ", json_encode($u->createObjectFromArrays($playerNames, $scores)), PHP_EOL;

// countValues
$orderStatuses = [
    "order1" => "pending",
    "order2" => "delivered",
    "order3" => "pending",
    "order4" => "cancelled",
    "order5" => "pending"
];
echo "[countValues] -> ", json_encode($u->countValues($orderStatuses)), PHP_EOL;

// extractProperties
$userProfile = [
    "name" => "Jean Martin",
    "email" => "jean@email.com",
    "password" => "secret123",
    "age" => 35,
    "address" => "123 rue Principal"
];
$publicInfo = ["name", "age"];
echo "[extractProperties] -> ", json_encode($u->extractProperties($userProfile, $publicInfo)), PHP_EOL;

// sortObjectByValue
$playerScores = [
    "Alice" => 85,
    "Bob" => 92,
    "Charlie" => 78,
    "David" => 95
];
echo "[sortObjectByValue] -> ", json_encode($u->sortObjectByValue($playerScores)), PHP_EOL;

// findMaxValue
$gameScores = [
    "level1" => 850,
    "level2" => 920,
    "level3" => 880,
    "level4" => 1020
];
echo "[findMaxValue] -> ", $u->findMaxValue($gameScores), PHP_EOL;

// createObjectFromPairs
$productPairs = [
    ["pommes", 2.5],
    ["bananes", 1.8],
    ["oranges", 2.2]
];
echo "[createObjectFromPairs] -> ", json_encode($u->createObjectFromPairs($productPairs)), PHP_EOL;

// groupByProperty
$students = [
    ["name" => "Alice", "level" => "Débutant"],
    ["name" => "Bob", "level" => "Intermédiaire"],
    ["name" => "Charlie", "level" => "Débutant"],
    ["name" => "David", "level" => "Avancé"]
];
echo "[groupByProperty] -> ", json_encode($u->groupByProperty($students, 'level')), PHP_EOL;

// validateObject
$userSchema = [
    "name" => "string",
    "age" => "number",
    "email" => "string"
];
$userInput = [
    "name" => "Marie",
    "age" => 25,
    "email" => "marie@email.com"
];
echo "[validateObject] -> ", $u->validateObject($userInput, $userSchema) ? 'true' : 'false', PHP_EOL;

// compareDifferences
$oldProfile = [
    "name" => "Jean Dupont",
    "email" => "jean@email.com",
    "age" => 30,
    "adress" => "123 rue Principal"
];
$newProfile = [
    "name" => "Jean Dupont",
    "email" => "jean.dupont@email.com",
    "age" => 31,
    "phone" => "0123456789"
];
echo "[compareDifferences] -> ", json_encode($u->compareDifferences($oldProfile, $newProfile)), PHP_EOL;

// objectToUrlParams
$searchParams = [
    "query" => "ordinateur portable",
    "maxPrice" => 1000,
    "brand" => "Dell",
    "inStock" => true
];
echo "[objectToUrlParams] -> ", $u->objectToUrlParams($searchParams), PHP_EOL;
