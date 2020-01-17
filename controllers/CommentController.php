<?php

namespace Valarep\controllers;

use Valarep\objects\Comment;

class CommentController
{
    public static function InsertAction($content, $id_post)
    {
        
        Comment::insert($content, $id_post);

        header("location: .");
    }
}