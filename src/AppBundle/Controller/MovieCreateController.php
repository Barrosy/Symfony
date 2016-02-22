<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Movie;

class MovieCreateController extends Controller
{
	public function formAction()
	{
		return $this->render('movies/create.html.twig');
	}

	public function insertAction(Request $request)
	{
		//$movie = new Movie($request->get('title'), str_replace('.', '', $request->get('price')), $request->get('description'));
		
		$movie = new Movie();

		if($request->get('title') != null)
		{
			$movie->setTitle($request->get('title'));
		}
		
		if(str_replace('.', '', $request->get('price')) != null)
		{
			$movie->setPrice(str_replace('.', '', $request->get('price')));
		}
		
		if($request->get('description') != null)
		{
			$movie->setDescription($request->get('description'));
		}

		$validator = $this->get('validator');
		$errors = $validator->validate($movie);

		if (count($errors) > 0)
		{
			$errorsString = (string) $errors;

			return $this->render('movies/customErrorPage.html.twig', array('errorsString' => $errorsString));
		}
		
		/* em stands for entity manager */
		$em = $this->getDoctrine()->getManager();
		$em->persist($movie);
		$em->flush();

		return $this->redirectToRoute('movies');
	}
}
