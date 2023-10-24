<?php

namespace App\Models\RecipesModel;

/**
 * Undocumented function
 *
 * @param string $description
 * @param integer $limit
 * @return string
 */
function truncateDescription(string $description, int $limit = 3): string
{
    $sentences = explode('.', $description);
    $shortDescription = implode('.', array_slice($sentences, 0, $limit));

    if (count($sentences) > $limit) {
        $shortDescription .= '...';
    }

    return $shortDescription;
}

/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @return array
 */
function findRandomRecipe(\PDO $connexion): array
{
    $sql = "SELECT 
                d.*, 
                u.name AS user_name, 
                ROUND(AVG(r.value), 2) AS avg_rating,
                COUNT(c.id) AS comment_count
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id, u.name
            ORDER BY RAND()
            LIMIT 1;";

    $rs = $connexion->query($sql);
    $recipe = $rs->fetch(\PDO::FETCH_ASSOC);

    // Pour remplacer la description originale par la version tronquée
    $recipe['description'] = truncateDescription($recipe['description']);

    return $recipe;
}
/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @return array
 */
function findAllPopularRecipes(\PDO $connexion): array
{
    $sql = "SELECT 
                d.id,
                d.name AS dish_name,
                ROUND(AVG(r.value), 2) AS avg_rating,
                d.description AS description, 
                u.name AS user_name,
                COUNT(c.id) AS comment_count,
                d.picture AS dish_picture
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY 
                d.id, d.name, 
                d.description, 
                u.name, 
                d.picture
            ORDER BY 
                avg_rating DESC
            LIMIT 3;";

    $rs = $connexion->query($sql);
    $recipes = $rs->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($recipes as &$recipe) {
        $recipe['short_description'] = truncateDescription($recipe['description']);
    }
    return $recipes;
}
/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @return array
 */
function findAllRecipes(\PDO $connexion): array
{
    $sql = "SELECT 
                d.id AS dish_id,
                d.name AS dish_name,
                ROUND(AVG(r.value), 2) AS avg_rating,
                d.description AS description, 
                u.name AS user_name,
                COUNT(c.id) AS comment_count,
                d.picture AS dish_picture
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id, u.name
            ORDER BY d.created_at DESC
            LIMIT 9;
            ";

    $rs = $connexion->query($sql);
    $recipes = $rs->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($recipes as &$recipe) {
        $recipe['short_description'] = truncateDescription($recipe['description']);
    }
    return $recipes;
}
/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @param integer $id
 * @return array
 */
function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT 
                d.id,
                d.name AS dish_name,
                d.picture AS dish_picture,
                ROUND(AVG(r.value), 2) AS avg_rating,
                d.prep_time AS prep_time,
                d.description AS dish_description,
                u.name AS user_name,
                u.picture AS user_picture,
                COUNT(c.id) AS comment_count,
                GROUP_CONCAT(i.name SEPARATOR '|') AS ingredients
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            LEFT JOIN dishes_has_ingredients di ON d.id = di.dish_id
            LEFT JOIN ingredients i ON di.ingredient_id = i.id
            WHERE d.id = :id
            GROUP BY d.id, u.name;
            ";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllByUserId(\PDO $connexion, int $user_id): array
{
    $sql = "SELECT 
                d.id,
                d.name AS dish_name,
                ROUND(AVG(r.value), 2) AS avg_rating,
                d.description AS dish_description,
                d.prep_time AS prep_time,
                d.picture AS dish_picture,
                d.created_at AS dish_creation_date
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            WHERE d.user_id = :user_id
            GROUP BY d.id
            ORDER BY d.created_at DESC
            LIMIT 9;
            ";


    $rs = $connexion->prepare($sql);
    $rs->bindValue(':user_id', $user_id, \PDO::PARAM_INT);
    $rs->execute();

    $recipesByUser = $rs->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($recipesByUser as &$recipeByUser) {
        $recipeByUser['short_description'] = truncateDescription($recipeByUser['dish_description']);
    }

    return $recipesByUser;

}






