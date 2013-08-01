<?php

namespace Model\Persistence;
use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="`Order`")
 */
class Order {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue */
    private $id;

    /** @ORM\OneToMany(targetEntity="OrderItem", mappedBy="order",fetch="LAZY") */
    private $items;

    /** @ORM\Column(type="boolean") */
    private $payed = false;

    /** @ORM\Column(type="boolean") */
    private $shipped = false;

    /** @ORM\Column(type="datetime") */
    private $created;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->created = new \DateTime("now");
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
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
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $payed
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;
    }

    /**
     * @return mixed
     */
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * @param mixed $shipped
     */
    public function setShipped($shipped)
    {
        $this->shipped = $shipped;
    }

    /**
     * @return mixed
     */
    public function getShipped()
    {
        return $this->shipped;
    }


}