<?php
/**
 * Created by PhpStorm.
 * User: matthieubain
 * Date: 13/12/2017
 * Time: 11:22
 */

namespace App\Routing;

use App\Renderer\TwigRenderer;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    /**
     * @var TwigRenderer
     */
    private $renderer;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $renderer = new TwigRenderer();
        $this->renderer = $renderer->getTwig();
    }

    /**
     * @param $template
     * @param $context
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render($template, $context)
    {
        $view = $this->renderer->render($template, $context);
        $response  = new Response($view);
        $response->send();
    }

}
