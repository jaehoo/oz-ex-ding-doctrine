<?php

namespace Model\Persistence;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;


/**
 * Product
 *
 * resultSetMapping= "mappingMultipleJoinsEntityResults"
 *
 * @ORM\Table(name="Product")
 * @ORM\Entity
 * @ORM\NamedQueries({
 *     @ORM\NamedQuery(name="getProductById", query="SELECT u FROM Model\Persistence\Person u WHERE u.id = :identifier"),
 *     @ORM\NamedQuery(name="all",     query="SELECT u FROM Model\Persistence\Person u")
 * })
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @ORM\OneToMany(targetEntity="Feature", mappedBy="product",cascade={"persist"}, fetch="LAZY")
     */
    private $features;


    public function __construct() {
        $this->features = new ArrayCollection();
    }

    /**
     * @param mixed $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection()
     */
    public function getFeatures()
    {
        return $this->features;
    }

    function __toString()
    {
        return get_class($this).":{ id:".$this->id.", name:".$this->name." }";
    }


}
