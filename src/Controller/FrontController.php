<?php
/**
 * Created by PhpStorm.
 * User: matthieubain
 * Date: 13/12/2017
 * Time: 11:54
 */

namespace Controller;


use App\Routing\Controller;

/**
 * Class FrontController
 * @package Controller
 */
class FrontController extends Controller
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function indexAction(){
        $this->render('home.html.twig', []);
    }

}