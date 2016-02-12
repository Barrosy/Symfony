<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{count}")
     */
    public function apiNumberAction($count)
    {
        /*$number = array();
        for($i = 0; $i < $count; $i++)
        {
            $numbers[] = rand(0, 100);
        }

        $numberList = implode(', ', $numbers);

        return new Response('<html><body>Lucky numbers: ' . $numberList . '</body></html>');*/

        /*for($i = 0; $i < $count; $i++)
        {
            $numbers[] = rand(0, 100);
        }

        $numberList = implode(', ', $numbers);

        $html = $this->container->get('templating')->render('lucky/number.html.twig', array('luckyNumberList' => $numberList));

        return new Response($html);*/

        for($i = 0; $i < $count; $i++)
        {
            $numbers[] = rand(0, 100);
        }

        $numberList = implode(', ', $numbers);

        return $this->render('lucky/number.html.twig', array('luckyNumberList' => $numberList));
    }
}
