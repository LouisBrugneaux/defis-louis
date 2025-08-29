<?php

namespace App\Service;

class ArrayObjectUtils
{
// Écrivez une fonction qui filtre un tableau d'objets selon une propriété et sa valeur
    public function filterByProperty(array $pairs,string $property, $value): array
    {
        $newObject = [];
        foreach ($pairs as $pair) {
            foreach ($pair as $key => $val) {
                if ($key === $property && $value === $val)
                    $newObject[] = $pair;
            }
        }
        return $newObject;
    }
    // Écrivez une fonction qui groupe les éléments d'un tableau selon une propriété
    public function groupBy(array $pairs,string $property): array
    {
        $newObject = [];
        foreach ($pairs as $pair) {
            $newObject[$pair[$property]][] = $pair;
        }
        return $newObject;
    }
    // Écrivez une fonction qui trouve l'intersection entre deux tableaux d'objets selon une propriété donnée
    public function findIntersection(array $pairsA,array $pairsB, string $property): array
    {
        $newObject = [];
        foreach ($pairsA as $pairA) {
            foreach ($pairsB as $pairB) {
                if ($pairB[$property] === $pairA[$property])
                    $newObject[] = $pairA;
            }
        }
        return $newObject;
    }
    // Écrivez une fonction qui transforme un tableau d'objets en utilisant une fonction de mapping personnalisée
    public function transformArray(array $pairs,callable $fn): array
    {
        $newObject = [];
        foreach ($pairs as $pair) {
            $newObject[] = $fn($pair);
        }
        return $newObject;
    }
    // Écrivez une fonction qui agrège les données d'un tableau d'objets
    public function aggregateData(array $pairs,string $groupByProperty, string $sumProperty): array
    {
        $newObject = [];
        foreach ($pairs as $pair) {
            if (!isset($newObject[$pair[$groupByProperty]]))
                $newObject[$pair[$groupByProperty]] = 0;
            $newObject[$pair[$groupByProperty]] += $pair[$sumProperty];
        }
        return $newObject;
    }
}
