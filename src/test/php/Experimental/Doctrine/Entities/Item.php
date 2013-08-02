<?php
namespace Model\Persistence;


use Doctrine\ORM\Mapping as ORM;
/**
 * Class Item
 * @ORM\Entity
 * @package Model\Persistence
 */
class Item {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue */
    private $id;

    /** @ORM\Column(type="string", nullable=false) */
    private $name;

    /** @ORM\Column(type="decimal") */
    private $currentPrice;


    /** @ORM\OneToMany(targetEntity="OrderItem", mappedBy="item",fetch="LAZY") */
    private $orders;


    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $currentPrice
     */
    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }



}