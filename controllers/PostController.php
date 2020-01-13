<?php 

namespace Valarep\controllers;

use Valarep\View;
use Valarep\objects\Post;

class PostController
{
    public static function ListAction()
    {
        // Liste de publication
        $postArray = Post::getAll();

       /* var_dump($postArray);
        $comments = $postArray[3]->getComments();
        var_dump($comments);
        die();*/

        View::setTemplate("post_list");
        View::bindVariable("title", "MonSite");
        View::bindVariable("postArray", $postArray);

        View::display();
    }

    public static function PostAction($title, $content)
    {
        Post::insert($title, $content);

        header("location: .");
    }
}