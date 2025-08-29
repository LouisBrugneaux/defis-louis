<?php

namespace App\Service;

class ObjectUtils
{

    // Écrivez une fonction qui récupère toutes les valeurs d'un objet
    public function objectValues(array $object): array
    {
        return array_values($object);
    }

    // Écrivez une fonction qui transforme les valeurs d'un objet
    public function transformValues(array $object, callable $fn): array
    {
        return array_map(function ($value) use ($fn) {
            return $fn($value);
        }, $object);
    }

    // Écrivez une fonction qui fusionne deux objets en sommant les valeurs numériques communes
    public function mergeObjects(array $a, array $b): array
    {
        $newObject = $a;
        foreach ($b as $key => $value) {
            if (is_numeric($newObject[$key]) && is_numeric($value)) {
                $newObject[$key] = $newObject[$key] + $value;
            } else {
                $newObject[$key] = 0;
            }
        }
        return $newObject;
    }

    // Écrivez une fonction qui filtre un objet selon une condition sur les valeurs
    public function filterObject(array $object, callable $fn): array
    {
        return array_filter($object, function ($value) use ($fn) {
            return $fn($value);
        });
    }

    /** Fonction non réalisée */
    // Écrivez une fonction qui convertit un objet plat en objet imbriqué en utilisant les points comme séparateurs
//    public function flatToNested(array $object): array
//    {
//
//    }

    // Écrivez une fonction qui trouve les clés d'un objet ayant une valeur spécifique
    public function findKeysByValue(array $object, int $number): array
    {
        $newObject = [];
        foreach ($object as $key => $value) {
            if ($value === $number) {
                $newObject[] = $key;
            }
        }
        return $newObject;
    }

    // Écrivez une fonction qui crée un objet à partir de deux tableaux
    public function createObjectFromArrays(array $keys, array $values): array
    {
        $newObject = [];
        $len = min(count($keys), count($values));
        for ($i = 0; $i < $len; $i++) {
            $newObject[$keys[$i]] = $values[$i];
        }
        return $newObject;
    }

    // Écrivez une fonction qui compte les occurences de valeurs dans un objet
    public function countValues(array $object): array
    {
        $newObject = [];
        foreach ($object as $value) {
            if (!array_key_exists($value, $newObject)) {
                $newObject[$value] = 0;
            }
            $newObject[$value]++;

        }
        return $newObject;
    }

    // Écrivez une fonction qui extrait certaines propriétés d'un objet
    public function extractProperties(array $object, array $properties): array
    {
        $newObject = [];
        foreach ($object as $key => $value) {
            if (in_array($key, $properties)) {
                $newObject[$key] = $value;
            }
        }
        return $newObject;
    }

    // Écrivez une fonction qui trie les propriétés d'un objet par valeur
    public function sortObjectByValue(array $object): array
    {
        asort($object);
        return $object;
    }

    // Écrivez une fonction qui trouve la valeur maximale dans un objet de nombres
    public function findMaxValue(array $object): int
    {
        $max = null;
        foreach ($object as $value) {
            if ($max === null || $value > $max) {
                $max = $value;
            }
        }
        return $max;
    }

    // Écrivez une fonction qui créé un objet à partir d'un tableau de paires clé-valeur
    public function createObjectFromPairs(array $pairs): array
    {
        $newObject = [];
        foreach ($pairs as $pair) {
            $newObject[$pair[0]] = $pair[1];
        }
        return $newObject;
    }

    /** Fonction non réalisée */
    // Écrivez une fonction qui recherche une valeur dans un objet imbriqué
//    public function findValueInObject(array $object, $searchValue): ?array
//    {
//    }

    // Écrivez une fonction qui groupe les objets par une propriété spécifique
    public function groupByProperty(array $pairs, string $property): array
    {
        $newObject = [];
        foreach ($pairs as $pair) {
            foreach ($pair as $key => $value) {
                if ($key === $property) {
                    $newObject[$value][] = $pair;
                }
            }
        }
        return $newObject;
    }

    // Écrivez une fonction qui vérifie si un objet correspond à un schéma spécifique
    public function validateObject(array $input, array $schema): bool
    {
        foreach ($schema as $key => $value) {
            if ($value === 'string' && !is_string($input[$key]))
                return false;
            if ($value === 'number' && !is_numeric($input[$key]))
                return false;
            if ($value === 'bool' && !is_bool($input[$key]))
                return false;
        }
        return true;
    }

    // Écrivez une fonction qui compare les modifications entre deux objets
    public function compareDifferences(array $old, array $new): array
    {
        $differences = [];
        foreach ($new as $key => $value) {
            if (!array_key_exists($key, $old)) {
                $differences[$key] = ['type' => 'added', 'new' => $value];
            } else {
                if ($old[$key] !== $value)
                    $differences[$key] = ['type' => 'modified', 'old' => $old[$key], 'new' => $value];
            }
        }
        // On regarde s'il y a eu des suppressions entre les 2 objets
        foreach ($old as $key => $value) {
            if (!array_key_exists($key, $new)) {
                $differences[$key] = ['type' => 'removed', 'old' => $value];
            }
        }
        return $differences;
    }

    // Écrivez une fonction qui convertit un objet en chaîne de paramètres d'URL
    public function objectToUrlParams(array $object): string
    {
        $partsURL = [];
        foreach ($object as $key => $value) {
            // Gerer les cas des booleens
            if (is_bool($value))
                $value = $value ? 1 : 0;

            $partsURL[] = urlencode($key) . '=' . urlencode($value);
        }
        return implode('&',$partsURL);
    }

    /** Fonction non réalisée */
    // Écrivez une fonction qui génère un résumé statistique d'un objet contenant des nombres
//    public function getObjectStats(array $object): array
//    {
//
//    }
}
