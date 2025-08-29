<?php

namespace App\Service;

class StringUtils
{
    #Créez une fonction qui prend une chaîne de caractères en paramètre et retourne sa longueur après avoir supprimé tous les espaces.
    public function lengthWithoutSpaces(string $string): int
    {
        $string = str_replace(' ', '', $string);
        return strlen($string);
    }

    // Développez une fonction qui accepte un prénom en paramètre et renvoie une salutation personnalisée en mettant la première lettre en majuscule.
    public function greet(string $firstName): string
    {
        $firstNameParts = explode('-', $firstName);

        if (count($firstNameParts)> 1){
            $firstName = '';
            foreach ($firstNameParts as $index => $part) {
                if ($index !== count($firstNameParts)-1){
                    $firstName .= ucfirst(strtolower($part)).'-';
                } else {
                    $firstName .= ucfirst(strtolower($part));
                }

            }
        } else {
            $firstName = ucfirst(strtolower($firstName));
        }

        return "Bonjour $firstName";
    }

    // Écrivez une fonction qui détermine si une chaîne de caractères se termine par un point d'exclamation.
    public function endsWithExclamation(string $string): bool
    {
        return str_ends_with($string, '!');
    }

    // Fonction d'inversion des mots
    public function reverseWords(string $string): string
    {
       $words = explode(' ', $string);

       $reverseWords = '';
       for ($i = count($words) - 1; $i >= 0; $i--) {
           $reverseWords .= $words[$i]. ' ';
       }
       return $reverseWords;
    }

    // Écrivez une fonction qui compte le nombre d'occurrences d'une lettre dans une chaîne
    public function countOccurrences(string $string, string $letter): int
    {
        if ($letter === '')
            return 0;
        $count = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] === $letter)
                $count++;
        }
        return $count;
    }

    // Écrivez une fonction qui convertit une chaîne en "camelCase"
    public function toCamelCase(string $string): string
    {
        $words = explode('_', $string);

        $camelCaseString = '';
        foreach ($words as $index => $word) {
            if ($index === 0) {
                $camelCaseString .= $word;
            } else {
                $camelCaseString .= ucfirst($word);
            }
        }
        return $camelCaseString;
    }

    // Écrivez une fonction qui compte le nombre de voyelles dans une chaîne
    public function countVowels(string $string): int
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];

        $count = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            if (in_array(strtolower($string[$i]), $vowels))
                $count++;
        }
        return $count;
    }

    // Écrivez une fonction qui alterne majuscules et minuscules dans une chaîne
    public function alternateCase(string $string): string
    {
        $alternateString = '';
        for ($i = 0; $i < strlen($string); $i++) {
            if ($i%2 === 0 )
                $alternateString .= strtoupper($string[$i]);
            else
                $alternateString .= strtolower($string[$i]);
        }
        return $alternateString;
    }

    // Écrivez une fonction qui supprime les caractères en double consécutifs
    public function removeDuplicates(string $string): string
    {
        if ($string === '')
            return '';
        $withoutDuplicateString = $string[0];
        for ($i = 1; $i < strlen($string); $i++) {
            if ($string[$i -1] !== $string[$i])
                $withoutDuplicateString .= $string[$i];

        }
        return $withoutDuplicateString;
    }

    // Écrivez une fonction qui extrait les initiales d'un nom complet
    public function initials(string $fullName): string
    {
        if ($fullName === '')
            return '';
        $initials = '';
        $fullNameParts = explode(" ", $fullName);
        foreach ($fullNameParts as $part) {
            $nameParts = explode("-", $part); // Gestion du cas de prénoms composés séparés par un tiret
            foreach ($nameParts as $namePart) {
                $initials .= $namePart[0];
            }
        }
        return $initials;
    }

    // Écrivez une fonction qui masque les caractères d'une chaîne sauf les N derniers
    public function maskString(string $string, int $last = 4): string
    {
        return substr($string, -$last);
    }

    // Écrivez une fonction qui vérifie si une chaîne est un palindrome
    public function isPalindrome(string $string): bool
    {
        $cutString = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($string)); // On retire tout ce qui n'est pas une lettre ou un chiffre
        if ($cutString === null)
            return false;
        return $cutString === strrev($cutString);
    }

    // Écrivez une fonction qui trouve la plus longue séquence de caractères identiques
    public function longestSequence(string $string): string
    {
        if ($string === '')
            return '';
        $longestString = $string[0];
        $bestLength = 1;
        $currentString = $string[0];
        $currentLength = 1;
        for ($i = 1; $i < strlen($string); $i++) {
            if ($string[$i-1] === $string[$i]) {
                $currentString .= $string[$i];
                $currentLength++;
            } else {
                if ($currentLength > $bestLength) {
                    $longestString = $currentString;
                    $bestLength = $currentLength;
                }
                $currentString = $string[$i];
                $currentLength = 1;
            }
        }
        if ($currentLength > $bestLength) {
            $longestString = $currentString;
        }
        return $longestString;
    }

    // Écrivez une fonction qui formate un texte en ajoutant des points de suspension
    public function truncate(string $string, int $limit): string
    {
        if ($string === '' || $limit === 0)
            return '';
        if (strlen($string) <= $limit)
            return $string;
        return substr($string, 0, $limit).'...';
    }

    // Écrivez une fonction qui capitalise la première lettre de chaque mot
    public function capitalizeWords(string $string): string
    {
        return ucwords(strtolower($string));
    }
}
