<?php
namespace Valarep;

class View
{
    private static $template = null;
    private static $variables = [];

    public static function setTemplate($name)
    {
        self::$template = "templates/" . $name . ".html.php";
    }

    public static function bindVariable($name, $value)
    {
        self::$variables[$name] = $value;
    }

    public static function display()
    {
        //Récupération de la racine de l'URL
        $router = new Router();
        $path = $router->getBasePath();

        // boucle de création de variables
        foreach (self::$variables as $name => $value)
        {
            $$name = $value;
        }

        require self::$template;
    }
}