<?php

namespace Model\Persistence;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feature
 *
 * @ORM\Table(name="Feature")
 * @ORM\Entity
 */
class Feature
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


//    /**
//     * @var integer
//     *
//     * @ORM\Column(name="product_id", type="integer", nullable=true)
//     */
//    private $productId;


    /**
     * @var \Model\Persistence\Product
     *
     * @ORM\ManyToOne(targetEntity="Product",inversedBy="features",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;



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
     * Set product
     *
     * @param \Model\Persistence\Product $product
     * @return Feature
     */
    public function setProduct(\Model\Persistence\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Model\Persistence\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

//    /**
//     * @param int $productId
//     */
//    public function setProductId($productId)
//    {
//        $this->productId = $productId;
//    }
//
//    /**
//     * @return int
//     */
//    public function getProductId()
//    {
//        return $this->productId;
//    }

    function __toString()
    {
      return get_class($this).":{ id:".$this->id.", product_id: ".$this->product->getId()." }";
    }


}
