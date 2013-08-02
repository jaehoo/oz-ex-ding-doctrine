<?php

namespace Test\Transactional;

use Logger;

/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 20/07/13
 * Time: 13:46
 * To change this template use File | Settings | File Templates.
 */
class TransactionalService {

    /**
     * @var \Doctrine\ORM\EntityManager EntityManager
     */
    private $entityManager;

    /**
     * @param mixed $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return mixed
     */
    public  function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @var Logger
     */
    private $log;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
    }

    public function doBusinessJob(){

        $this->log->info("I'm don`t have Transactional Aspect!");

        $this->entityManager->beginTransaction();
        $this->log->info($this->entityManager->isOpen());
        $this->entityManager->rollback();

    }

}

