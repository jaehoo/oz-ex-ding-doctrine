<?php
/**
 * Created by Alberto Sánchez.
 * Date: 9/07/13
 * Time: 03:38 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

namespace Model\Dao;


interface GenericDao {

    public function save($Entity);

    public function delete($Entity);

    public function update($Entity) ;

    public function find($Entity, $keyValue);

    //public function flush();

    //public function clear();

}