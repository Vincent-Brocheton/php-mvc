<?php

namespace Valarep\objects;

use Valarep\dao\PostDao;
use Valarep\dao\CommentDao;


class Post
{
    public $id;
    public $title;
    public $content;
    private $comments;

    public static function getAll()
    {
        return PostDao::getAll();
    }

    public function getComments(){
        if ($this->comments == null)
        {
            //Il faut charger les commentaires
            $this->comments = CommentDao::getComments($this->id);
        }

        return $this->comments;
    }

    public static function insert($title, $content)
    {
        PostDao::insert($title, $content);
    }
}