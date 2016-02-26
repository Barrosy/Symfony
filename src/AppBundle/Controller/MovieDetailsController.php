<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Movie;

class MovieDetailsController extends Controller
{
	public function showAction($id)
	{
		//return $this->render();
		$movie = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Movie')->Find($id);

		if($movie != null)
		{
			return $this->render('movies/details.html.twig', array('movie' => $movie));
		}
		else
		{
			throw $this->createNotFoundException('No movie found with ID: ' . $id);
		}
	}
}