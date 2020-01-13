<?php
namespace Valarep\dao;

use\PDO;

class PostDao
{
    public static function getAll()
    {
        $dbh = Dao::open(); //DataBase Handler (PDO)
        $query = "SELECT * 
                    FROM `post` 
                    ORDER BY `id` DESC";
        $sth = $dbh->prepare($query); //PDOStatement
        $sth->execute();
        $sth->setFetchMode(
            PDO::FETCH_CLASS, //On veut des objets
            "Valarep\\objects\\Post" // La classe Post complétement qualifiée
        );
        $items = $sth->fetchAll();
        Dao::close();
        return $items;
    }

    public static function insert($title, $content)
    {
        $dbh = Dao::open(); //DataBase Handler (PDO)
        $query = "INSERT INTO `post`
                    (`title`, `content`)
                    VALUES (:title, :content)";
        $sth = $dbh->prepare($query); //PDOStatement
        $sth->bindParam(":title", $title);
        $sth->bindParam(":content", $content);
        $affectedRows = $sth->execute();
        if ($affectedRows != 1)
        {
            throw new Exception("SQL statement failed");
        }
        Dao::close();
    }
}