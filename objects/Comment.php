<?php

namespace Valarep\objects;

use Valarep\dao\CommentDao;

class Comment
{
    public $id;
    public $datetime;
    public $content;
    private $id_post;

    public static function insert($title, $content)
    {
        CommentDao::insert($title, $content);
    }
}