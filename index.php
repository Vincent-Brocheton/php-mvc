<?php
namespace Valarep;

// début de l'application web

// Chargement automatique des classes
require_once "vendor/autoload.php";

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
        PostController::PostAction($title, $content);
    default:
        //todo: ERREUR 404
        break;
}