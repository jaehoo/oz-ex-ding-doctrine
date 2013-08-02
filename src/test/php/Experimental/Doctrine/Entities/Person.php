<?php

namespace Model\Persistence;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="PERSON")
 * @ORM\Entity
 */
class Person
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * Unidirectional - One-To-Mane
     * @var \Doctrine\Common\Collections\ArrayCollection(\Model\Persistence\Tarea)
     * @ORM\OneToMany(targetEntity="Tarea",mappedBy="idPerson",cascade={"all"})
     */
    private $tareas;

    function __construct()
    {

        //$this->tareas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection(\Model\Persistence\Tarea) $tareas
     */
    public function setTareas($tareas)
    {
        $this->tareas = $tareas;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection(\Model\Persistence\Tarea)
     */
    public function getTareas()
    {
        return $this->tareas;
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

    /**
     * Set name
     *
     * @param string $name
     * @return Person
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



}
