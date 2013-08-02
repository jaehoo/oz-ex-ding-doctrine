<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 13/07/13
 * Time: 23:44
 * To change this template use File | Settings | File Templates.
 */

namespace Model\Persistence;


class Result {


    private $res1;
    private $res2;

    /**
     * @param mixed $res2
     */
    public function setRes2($res2)
    {
        $this->res2 = $res2;
    }

    /**
     * @return mixed
     */
    public function getRes2()
    {
        return $this->res2;
    }

    /**
     * @param mixed $res1
     */
    public function setRes1($res1)
    {
        $this->res1 = $res1;
    }

    /**
     * @return mixed
     */
    public function getRes1()
    {
        return $this->res1;
    }



}