<?php
namespace imie\AdminBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController as Controller;
use Doctrine\ORM\EntityManager;
use imie\AdminBundle\Entity\Product;

class RestProductController extends Controller
{
	public function getProductAction($id)
	{
		$entityManager = $this->getDoctrine()->getManager();

		$product = $entityManager
			->getRepository('imieAdminBundle:Product')->findOneById($id);

		if($product)
		{
			$view = $this->view('$product', 200);
		}
		else
		{
			$view = $this->view('', 404);
		}
		return $this->handleView($view);
	}  
}
