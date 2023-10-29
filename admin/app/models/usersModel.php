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
            ORDER BY 
            created_at DESC;
            ";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insert(\PDO $connexion, array $data = null)
{
    $data['created_at'] = date('Y-m-d H:i:s');

    $sql = "INSERT INTO users
            SET name= :name,
                email= :email,
                password= :password,
                biography= :biography,
                created_at= :created_at;
           ";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(":name", $data["name"], \PDO::PARAM_STR);
    $rs->bindValue(":email", $data["email"], \PDO::PARAM_STR);
    $rs->bindValue(":password", $data["password"], \PDO::PARAM_STR);
    $rs->bindValue(":biography", $data["biography"], \PDO::PARAM_STR);
    $rs->bindValue(":created_at", $data["created_at"], \PDO::PARAM_STR);

    $rs->execute();

    return $connexion->lastInsertId();
}

namespace App\Models\UsersModel;

// Je vérifie si l'utilisateur que je veux supprimer possède des recettes pour pouvoir procéder à une suppression en cascade

function hasAssociatedDishes(\PDO $connexion, int $userId): bool
{
    $sql = "SELECT COUNT(*) FROM dishes WHERE user_id = :id";
    $rs = $connexion->prepare($sql);
    $rs->bindParam(":id", $userId, \PDO::PARAM_INT);
    $rs->execute();
    $count = $rs->fetchColumn();
    
    return $count > 0;
}

function delete(\PDO $connexion, int $id): bool
{
    // 1. Je supprime d'abord les relations associées dans `dishes_has_ingredients`
    $sql = "DELETE FROM dishes_has_ingredients 
                   WHERE dish_id 
                   IN (SELECT id FROM dishes WHERE user_id = :id)";
    $rs = $connexion->prepare($sql);
    $rs->bindParam(":id", $id, \PDO::PARAM_INT);
    $rs->execute();

    // 2. Ensuite,je supprime les plats associés à l'utilisateur
    $sql = "DELETE FROM dishes WHERE user_id = :id";
    $rs = $connexion->prepare($sql);
    $rs->bindParam(":id", $id, \PDO::PARAM_INT);
    $rs->execute();

    // 3. Enfin, je supprime l'utilisateur
    $sql = "DELETE FROM users WHERE id = :id";
    $rs = $connexion->prepare($sql);
    $rs->bindParam(":id", $id, \PDO::PARAM_INT);
    
    return $rs->execute();
}
