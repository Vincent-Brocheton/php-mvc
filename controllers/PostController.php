<?php 

namespace Valarep\controllers;

use Valarep\View;
use Valarep\route;
use Valarep\router;
use Valarep\objects\Post;

class PostController
{
    public static function route()
    {
        $router = new Router();
        $router->addRoute(new Route("/", "PostController", "listAction"));
        $router->addRoute(new Route("/posts", "PostController", "listAction"));
        $router->addRoute(new Route("/post/insert", "PostController", "insertAction"));
        
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
    public static function ListAction()
    {
        // Route : /
        // Route : /posts

        // Liste de publication
        $postArray = Post::getAll();

        View::setTemplate("post_list");
        View::bindVariable("title", "MonSite");
        View::bindVariable("postArray", $postArray);

        View::display();
    }

    public static function InsertAction()
    {
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING) ;

        // Route : /post/insert
        Post::insert($title, $content);

        //Récupération de la racine de l'URL
        $router = new Router();
        $path = $router->getBasePath();
        header("location: {$path}/");
    }
}