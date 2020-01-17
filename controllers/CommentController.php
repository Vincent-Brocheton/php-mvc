<?php

namespace Valarep\controllers;
use Valarep\route;
use Valarep\router;
use Valarep\objects\Comment;

class CommentController
{
    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/comment/insert/{id_post}", "CommentController", "insertAction"));
        
        $route = $router->findRoute();
        
        if($route)
        {
            $route->execute();
        }
        else
        {
            //Route vers une page 404
            echo "Page not Found";
        }
    }


    public static function InsertAction($id_post)
    {
        $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
        Comment::insert($content, $id_post);

        //Récupération de la racine de l'URL
        $router = new Router();
        $path = $router->getBasePath();
        header("location: {$path}/");
    }
}