<?php

namespace Model\Persistence;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class OrderItem {

    /** @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Order",inversedBy="items", fetch="LAZY")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_order", referencedColumnName="id")
     * })
     */
    private $order;

    /** @ORM\Id
     * @ORM\ManyToOne(targetEntity="Item",fetch="LAZY", inversedBy="orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_item", referencedColumnName="id")
     * })
     *
     */
    private $item;

    /** @ORM\Column(type="integer") */
    private $amount = 1;

    /** @ORM\Column(type="decimal") */
    private $offeredPrice;

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $offeredPrice
     */
    public function setOfferedPrice($offeredPrice)
    {
        $this->offeredPrice = $offeredPrice;
    }

    /**
     * @return mixed
     */
    public function getOfferedPrice()
    {
        return $this->offeredPrice;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    function __toString()
    {

        return get_class($this).":{ id_order:".$this->order->getId().", id_item:".$this->item->getId()." }";

    }


//    public function __construct(Order $order, Product $product, $amount = 1)
//    {
//        $this->order = $order;
//        $this->product = $product;
//        $this->offeredPrice = $product->getCurrentPrice();
//    }



}