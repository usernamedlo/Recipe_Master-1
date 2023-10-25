<?php

namespace App\Models\CategoriesModel;

/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @return array
 */

function getAllCategories(\PDO $connexion): array
{

    $sql = "SELECT
                id, 
                name,
                description
            FROM types_of_dishes
            ORDER BY id ASC;
           ";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}