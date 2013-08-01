<?php
/**
 * Created by Alberto Sánchez.
 * Date: 9/07/13
 * Time: 03:43 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

namespace Model\Dao;


/**
 * Class TaskManagerDao
 * @package Model\Dao
 */
interface TaskManagerDao extends GenericDao{

    /**
     * @param \Task $task
     * @return $Task
     */
    public function addTask(\Task $task);

    /**
     * @param \Task $task
     * @return mixed
     */
    public function updateTask(\Task $task);

}