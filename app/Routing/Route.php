<?php
/**
 * Created by PhpStorm.
 * User: matthieubain
 * Date: 13/12/2017
 * Time: 12:00
 */

namespace App\Routing;

use App\Hydrator;


/**
 * Class Route
 * @package App\Routing
 */
class Route
{
    use Hydrator;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $controller;
    /**
     * @var string
     */
    private $action;

    private $parameter;

    /**
     * Route constructor.
     * @param array $data
     */
    public function __construct($name, array $data)
    {
        $this->setName($name);
        $this->hydrate($data);
    }

    /**
     * @param $url
     * @return $this|bool
     */
    public function match($url)
    {
        if (preg_match("#^" . $this->getPath() . "$#", $url, $matches) === 1) {
            $this->setParameter($matches);
            return $this;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     *
     */
    public function go()
    {
        $controller = "Controller\\" . $this->getController();
        $controller = new $controller();
        $action = $this->getAction() . "Action";
        $controller->$action($this->getParameter());
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @param mixed $parameter
     */
    public function setParameter($parameter): void
    {
        $this->parameter = $parameter;
    }





}