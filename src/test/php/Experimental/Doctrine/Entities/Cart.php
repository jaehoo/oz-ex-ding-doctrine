<?php
/**
 * Created by Alberto Sánchez.
 * Date: 16/07/13
 * Time: 11:30 AM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

namespace Model\Persistence;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Cart")
 */
class Cart {

//    /**
//     * @var integer
//     * @ORM\Id
//     * @ORM\Column(name="id_customer", type="integer", nullable=false)
//     * @ORM\GeneratedValue
//     */
//    private $id;


    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     * @ORM\JoinColumn(name="id_customer", referencedColumnName="id_customer")
     */
    private $customer;

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

//    /**
//     * @param int $id
//     */
//    public function setId($id)
//    {
//        $this->id = $id;
//    }
//
//    /**
//     * @return int
//     */
//    public function getId()
//    {
//        return $this->id;
//    }


}