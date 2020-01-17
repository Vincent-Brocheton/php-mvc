<?php
namespace Valarep;

// début de l'application web

// Chargement automatique des classes
require_once "vendor/autoload.php";

$router = new Router();
$router->addRoute(new Route("/", "PostController"));
$router->addRoute(new Route("/posts", "PostController"));
$router->addRoute(new Route("/post/{*}", "PostController"));

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
/*
//inclusion des classes externes
use Valarep\controllers\PostController;

// récupération de la variable transmise par GET
// est ce qu'on a cliqué sur le navbar ?

if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else 
{
    // page par défaut
    $page = 'post-list';
}

switch($page)
{
    case 'post-list':
        //Routage vers le controller
        PostController::ListAction();
        break;
    case 'post-insert':
        //routage vers le controller
        $title = $_POST['title'];
        $content = $_POST['content'];
        PostController::InsertAction($title, $content);
        case 'comment-insert':
            // routage vers CommentController
            $id_post = $_GET['id_post'];
            $content = $_POST['content'];
    
            CommentController::InsertAction($content, $id_post);
            break;
    default:
        //todo: ERREUR 404
        break;
}*/