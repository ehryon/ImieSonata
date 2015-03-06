<?php

namespace imie\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="product")
* @author ehryon
*/
class Product
{
	/**
    * @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	* @var integer
	*/
	protected $id;
	
	/**
	* @ORM\Column(type="string", length=100)
	* @var string
	*/
	protected $name;
	
	/**
	* @ORM\Column(type="decimal", scale=2)
	* @var float
	*/
	protected $price;

	/**
	* @ORM\Column(type="text")
	* @var string
	*/
	protected $description;


    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     */
    public function __toString()
    {
        return $this->name;
    }
}
