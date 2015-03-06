<?php

namespace imie\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JSON;
/**
* @ORM\Entity
* @ORM\Table(name="product")
* @JSON\ExclusionPolicy("ALL")
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
    * @JSON\Expose
    * @JSON\Since("1.0")
    * @JSON\Groups({"api_process"})
	* @var string
	*/
	protected $name;
	
	/**
	* @ORM\Column(type="decimal", scale=2)
    * @JSON\Expose
    * @JSON\Since("1.0")
    * @JSON\Groups({"api_process"})
	* @var float
	*/
	protected $price;

	/**
	* @ORM\Column(type="text")
    * @JSON\Expose
    * @JSON\Since("1.0")
    * @JSON\Groups({"api_process"})
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
    public function FunctionName($value='')
    {
        # code...
    }

    /**
     *
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
