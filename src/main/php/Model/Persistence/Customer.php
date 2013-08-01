<?php
/**
 * Created by Alberto Sánchez.
 * Date: 16/07/13
 * Time: 11:31 AM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

namespace Model\Persistence;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Customer")
 */
class Customer {

    /**
     * @ORM\Id
     * @ORM\Column(name="id_customer", type="integer", nullable=false)
     * @ORM\GeneratedValue */
    private $id;

    /**
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Cart", mappedBy="customer")
     * @ORM\JoinColumn(name="id_customer", referencedColumnName="id_customer")
     */
    private $cart;

    /**
     * @param mixed $cart
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }

    /**
     * @return mixed
     */
    public function getCart()
    {
        return $this->cart;
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


}