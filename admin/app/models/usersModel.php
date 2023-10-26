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