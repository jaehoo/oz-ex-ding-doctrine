<?php

namespace Model\Persistence;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarea
 *
 * @ORM\Table(name="TAREA")
 * @ORM\Entity
 */
class Tarea
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
     * @var \Model\Persistence\Person
     *
     * @ORM\ManyToOne(targetEntity="Person",inversedBy="tareas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_person", referencedColumnName="id", nullable=false)
     * })
     */
    private $idPerson;


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
     * Set idPerson
     *
     * @param \Model\Persistence\Person $idPerson
     * @return Tarea
     */
    public function setIdPerson(\Model\Persistence\Person $idPerson = null)
    {
        $this->idPerson = $idPerson;
    
        return $this;
    }

    /**
     * Get idPerson
     *
     * @return \Model\Persistence\Person
     */
    public function getIdPerson()
    {
        return $this->idPerson;
    }

    public function __toString()
    {
        return "";
    }


}
