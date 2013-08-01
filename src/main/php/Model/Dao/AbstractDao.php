<?php
/**
 * Created by Alberto Sánchez.
 * Date: 9/07/13
 * Time: 03:36 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

namespace Model\Dao;

use Doctrine\ORM\EntityManager;

/**
 * @Component
 */
abstract class AbstractDao {

    /**
     *
     * @Resource
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @param mixed $entityManager
     */
    public function setEntitymanager(\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $entity
     */
    public function save($entity){
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function delete($entity){

        $this->entityManager->delete($entity);
    }

    public function update($entity) {
        $this->entityManager->merge($entity);
        $this->entityManager->flush();
    }

    public function find($entity, $keyValue){

    }

}