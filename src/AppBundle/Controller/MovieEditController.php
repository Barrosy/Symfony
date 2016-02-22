<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Movie;

class MovieEditController extends Controller
{
	public function formAction($id)
	{
		return $this->render('movies/edit.html.twig', array('id' => $id));
	}

	public function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		if(!$id)
		{
			throw $this->createNotFoundException('No ID found');
		}

		$movie = $em->getRepository('AppBundle:Movie')->find($id);

		if(!$movie)
		{
			throw $this->createNotFoundException('No movie found for the movie with id: ' . $id);
		}

		if($request->get('title') != null | str_replace('.', '', $request->get('price')) != null | $request->get('description') != null)
		{
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

			$em->flush();
		}
		else
		{
			$errorsString = "";
			return $this->render('movies/customErrorPage.html.twig', array('errorsString' => $errorsString));
		}

		return $this->redirectToRoute('movies');
	}
}
