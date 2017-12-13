<?php

namespace App;

use App\Routing\Router;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: matthieubain
 * Date: 13/12/2017
 * Time: 13:56
 */

class App
{
    public static function run()
    {
        $request = Request::createFromGlobals();
        $uri = $request->getRequestUri();
        $router = new Router();
        $route = $router->match($uri);
        $route->go();

    }

}