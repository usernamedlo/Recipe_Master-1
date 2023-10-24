<?php

namespace App\Models\CommentsModel;

/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @param integer $dish_id
 * @return array
 */
function findAllCommentsByDishId(\PDO $connexion, int $dish_id): array
{
    $sql = "SELECT 
                c.*, 
                u.name AS user_name,
                u.picture AS user_picture
            FROM comments c
            INNER JOIN users u ON c.user_id = u.id
            WHERE c.dish_id = :dish_id
            ORDER BY c.created_at DESC;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':dish_id', $dish_id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
