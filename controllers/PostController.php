<?php 

namespace Valarep\controllers;

use Valarep\View;
use Valarep\objects\Post;

class PostController
{
    public static function ListAction()
    {
        // Liste de publication
        $postArray = [];

        $post = new Post();
        $post->title = "Post 1";
        $post->content = "Contenu du post 1";
        $postArray[] = $post;

        $post = new Post();
        $post->title = "Post 2";
        $post->content = "Contenu du post 2";
        $postArray[] = $post;

        View::setTemplate("post_list");
        View::bindVariable("postArray", $postArray);

        View::display();
    }
}