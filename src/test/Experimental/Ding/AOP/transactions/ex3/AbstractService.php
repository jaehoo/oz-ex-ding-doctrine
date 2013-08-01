<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 20/07/13
 * Time: 20:59
 * To change this template use File | Settings | File Templates.
 */

namespace Experimental\DI\AOP\transactions;


abstract class AbstractService {

    /**
     * @var \Doctrine\ORM\EntityManager EntityManager
     */
    protected $entityManager;

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public  function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return \Doctrine\ORM\EntityManager EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }


}