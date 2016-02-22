<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Movie;

class MovieDisplayController extends Controller
{
	public function showAction()
	{
		$movies = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Movie')->FindAll();

		return $this->render('movies/index.html.twig', array(
			'movies' => $movies
			));
	}
}
