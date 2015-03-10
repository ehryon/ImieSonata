<?php
namespace imie\AdminBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController as Controller;
use Doctrine\ORM\EntityManager;
use imie\AdminBundle\Entity\Product;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class RestProductController extends Controller
{
	/**
	 * @ApiDoc(
	 * resource=true,
	 * section="Rest CRUD Product",
	 * description="Show Entity",
     * statusCodes={
     * 		200="Returned when successful",
     * 		400="Returned when the form has error",
     *		404="Returned when the product is not found",
     * }
	 * )
	 */
	public function getProductAction($id)
	{
		$entityManager = $this->getDoctrine()->getManager();

		$product = $entityManager
		->getRepository('imieAdminBundle:Product')->findOneById($id);

		if($product)
		{
			$view = $this->view($product, 200);
		}
		else
		{
			$view = $this->view('', 404);
		}
		return $this->handleView($view);
	}  

	
	public function getProductsAction()
	{
		$entityManager = $this->getDoctrine()->getManager();

		$product = $entityManager
			->getRepository('imieAdminBundle:Product')->findAll();

		if($product)
		{
			$view = $this->view($product, 200);
		}
		else
		{
			$view = $this->view('', 404);
		}
		return $this->handleView($view);
	}

	/**
	 * Create a Product
	 * @ApiDoc(
	 * resource=true,
	 * section="Rest CRUD Product",
	 * description="Create Entity",
	 * statusCodes={
     * 		200="Returned when successful, product is created",
     *		404="Returned when the product is not found",
     * 		400="Returned when the form has error",
     * },
     * input="imie\AdminBundle\Entity\Product",
     * output="imie\AdminBundle\Entity\Product"
	 * )
	 */
	public function postProductAction()
	{
		$product = new Product();
		
		$json = json_decode($this->getRequest()->getContent(), true);

		$this->extract($product,$json);

		$entityManager = $this->getDoctrine()->getManager();
		$entityManager->persist($product);
		// writes in db when flush
		$entityManager->flush();

		// returns a view to the user 

		$view = $this->view($product, 200);

		return $this->handleView($view);
	}

	/**
	 * converts json into a product object 
	 */
	public function extract(Product $product, $json)
	{
		if($json)
		{
			// check for id in json array
			if(array_key_exists('name', $json))
			{
				$product->setName($json['name']);
			}
			if(array_key_exists('price', $json))
			{
				$product->setPrice($json['price']);
			}
			if(array_key_exists('description', $json))
			{
				$product->setDescription($json['description']);
			}
		}
	}
}
