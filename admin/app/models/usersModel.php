<?php

namespace App\Models\UsersModel;

/**
 * Undocumented function
 *
 * @param \PDO $connexion
 * @return array
 */
function findAllUsers(\PDO $connexion): array
{
    $sql = "SELECT 
                u.id AS user_id,
                u.name AS user_name, 
                u.email AS email,
                u.password AS pwd,
                u.biography AS bio
            FROM users u
            GROUP BY u.id
            ORDER BY u.id ASC;
            ";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
