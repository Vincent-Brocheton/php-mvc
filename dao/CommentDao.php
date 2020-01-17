<?php
namespace Valarep\dao;

use\PDO;
use\Exception;

class CommentDao
{
    public static function getComments($id_post)
    {
        $dbh = Dao::open(); //DataBase Handler (PDO)
        $query = "SELECT * 
                    FROM `comment` 
                    WHERE `id_post` = :id_post;";
        $sth = $dbh->prepare($query); //PDOStatement
        $sth->bindParam(":id_post", $id_post);
        $sth->execute();
        $sth->setFetchMode(
            PDO::FETCH_CLASS, //On veut des objets
            "Valarep\\objects\\comments" // La classe Post complétement qualifiée
        );
        $items = $sth->fetchAll();
        Dao::close();
        return $items;
    }

    public static function insert($content, $id_post)
    {
        $dbh = Dao::open(); //DataBase Handler (PDO)
        $query = "INSERT INTO `comment`
                    (`content`, `id_post`)
                    VALUES (:content, :id_post)";
        $sth = $dbh->prepare($query); //PDOStatement
        $sth->bindParam(":content", $content);
        $sth->bindParam(":id_post", $id_post);
        $affectedRows = $sth->execute();
        if ($affectedRows != 1)
        {
            throw new Exception("SQL statement failed");
        }
        Dao::close();
    }
}