<?php

namespace Valarep\controllers;
use Valarep\route;
use Valarep\router;
use Valarep\objects\Comment;
use Exception;

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
        //Securisation du paramètre 
        $id_post = filter_var($id_post, FILTER_VALIDATE_INT);

        if(empty($id_post))
        {
            //ERREUR
            echo "Wesh tu fais quoi là?";
        }else
        {
         //Récupération des informations du formulaire
        $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
        try{
        Comment::insert($content, $id_post);
        }
        catch(Exception $e)
        {
            echo "pas de bol...";
            die();
        }

        //Récupération de la racine de l'URL
        $router = new Router();
        $path = $router->getBasePath();
        header("location: {$path}/");
        }
    }
}