<?php
/**
 * Created by PhpStorm.
 * User: matthieubain
 * Date: 13/12/2017
 * Time: 11:36
 */

namespace App\Renderer;


class TwigRenderer
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct()
    {
        $this->configure();
    }

    public function configure()
    {
        $loader = new \Twig_Loader_Filesystem([__DIR__ . "/../../src/view"]);
        $this->twig = new \Twig_Environment($loader, []);
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        return $this->twig;
    }



}