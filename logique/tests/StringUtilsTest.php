<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Service\StringUtils;

$u = new StringUtils();

// lengthWithoutSpaces
$input = "Bonjour le monde !";
echo "[lengthWithoutSpaces] Input: \"$input\" -> ", $u->lengthWithoutSpaces($input), PHP_EOL;

// greet
$firstName = "jean-marc-andré";
echo "[greet] Input: \"$firstName\" -> ", $u->greet($firstName), PHP_EOL;

// endsWithExclamation
$phrase = "Je suis très satisfait !";
echo "[endsWithExclamation] Input: \"$phrase\" -> ", ($u->endsWithExclamation($phrase) ? "true" : "false"), PHP_EOL;

// reverseWords
$reverseWords = "Je mange une pomme";
echo "[reverseWords] Input: \"$reverseWords\" -> ", ($u->reverseWords($reverseWords)), PHP_EOL;

// countOccurrences
$s = "banane";
$letter = "n";
echo "[countOccurrences] \"$s\", lettre \"$letter\" -> ", $u->countOccurrences($s, $letter), PHP_EOL;

// toCamelCase
$snake = "user_first_name";
echo "[toCamelCase] \"$snake\" -> ", $u->toCamelCase($snake), PHP_EOL;

// countVowels
$mot = "Bonjour";
echo "[countVowels] \"$mot\" -> ", $u->countVowels($mot), PHP_EOL;

// alternateCase
$alt = "bonjour";
echo "[alternateCase] \"$alt\" -> ", $u->alternateCase($alt), PHP_EOL;

// removeDuplicates
$dups = "Bonjouuuur !!!";
echo "[removeDuplicates] \"$dups\" -> ", $u->removeDuplicates($dups), PHP_EOL;

// initials
$fullName = "Jean-Pierre Dupont";
echo "[initials] \"$fullName\" -> ", $u->initials($fullName), PHP_EOL;

// maskString
$secret = "1234567890123456";
echo "[maskString] \"$secret\", last=4 -> ", $u->maskString($secret, 4), PHP_EOL;

// isPalindrome
$pal = "Eh ! ça va la vache ?";
echo "[isPalindrome] \"$pal\" -> ", ($u->isPalindrome($pal) ? "true" : "false"), PHP_EOL;

// longestSequence
$seq = "aaabbbbbcccc";
echo "[longestSequence] \"$seq\" -> \"", $u->longestSequence($seq), "\"", PHP_EOL;

// truncate
$long = "Ceci est une très longue description";
echo "[truncate] \"$long\", limit=20 -> \"", $u->truncate($long, 20), "\"", PHP_EOL;

// capitalizeWords
$t = "bienvenue sur notre site web";
echo "[capitalizeWords] \"$t\" -> \"", $u->capitalizeWords($t), "\"", PHP_EOL;


