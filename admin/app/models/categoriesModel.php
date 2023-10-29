<?php

namespace App\Models\CategoriesModel;

/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @return array
 */

function findAllCategories(\PDO $connexion): array
{

    $sql = "SELECT
                id AS category_id, 
                name AS category_name,
                description AS category_description
            FROM types_of_dishes
            ORDER BY name ASC;
           ";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}