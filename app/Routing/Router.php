<?php
/**
 * Created by PhpStorm.
 * User: matthieubain
 * Date: 13/12/2017
 * Time: 12:02
 */

namespace App\Routing;


use Symfony\Component\Yaml\Yaml;

/**
 * Class Router
 * @package App\Routing
 */
class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->setRoutes();
    }

    /**
     * @return mixed
     */
    public function getYmlRoutes()
    {
        $routes = Yaml::parse(file_get_contents(__DIR__ . '/../config/routes.yml'));
        return $routes;
    }

    /**
     *
     */
    private function setRoutes()
    {
        $routes = $this->getYmlRoutes();
        foreach ($routes as $name => $data) {
            $this->routes[] = new Route($name, $data);
        }
    }

    /**
     * @param $uri
     * @return Route
     */
    public function match($uri)
    {
        foreach ($this->getRoutes() as $route) {
            if ($match = $route->match($uri)) {
                return $match;
            }
        }
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }


}