<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class FirstController extends Controller
{
    /**
     * @Route("/FirstController")
     */
    public function myFirstAction()
    {
        return new Response("Woohoo my really first own php file on github!");
    }
}
