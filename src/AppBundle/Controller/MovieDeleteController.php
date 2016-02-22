<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Movie;

class MovieDeleteController extends Controller
{

	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		if(!$id)
		{
			throw $this->createNotFoundException('No ID found');
		}

		$movie = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Movie')->Find($id);

		if($movie != null)
		{
			$em->remove($movie);
			$em->flush();
		}

		return $this->redirectToRoute('movies');
	}
}
