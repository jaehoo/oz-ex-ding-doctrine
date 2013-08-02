<?php
/**
 * Created by Alberto Sánchez.
 * Date: 9/07/13
 * Time: 04:36 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

namespace Model\Dao;


/**
 * Class DatabaseTaskManagerDaoImpl
 * @package Model\Dao
 */
class DatabaseTaskManagerDaoImpl extends AbstractDao implements TaskManagerDao {

    /**
     * @param \Task $task
     */
    public function addTask(\Task $task)
    {
        $this->entityManager->persist($task);
        $this->entityManager->flush();

    }

    /**
     * @param \Task $task
     * @return mixed|void
     */
    public function updateTask(\Task $task)
    {
        $this->entityManager->merge($task);
        $this->entityManager->flush();
    }
}