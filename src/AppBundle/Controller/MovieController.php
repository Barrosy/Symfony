<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Movie;

class MovieController extends Controller
{
    /**
     * @Route("/movies")
     */
    public function indexAction()
    {
        return new Response("Woohoo my really first own php file on github!");
    }
	
	public function createAction()
	{
		$movie = new Movie();
		$movie->setName('A wonderful day');
		$movie->setPrice('14.99');
		$movie->setDescription('Day shines bright defining a wonderful day.');
		
		/* em stands for entity manager */
		$em = $this->getDoctrine()->getManager();
		$em->persist($movie);
		$em->flush();
		
		return new Response('Created movie id ' . $movie->getId());
	}
}
