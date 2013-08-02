<?php
/**
 * Created by Alberto Sánchez.
 * Date: 12/07/13
 * Time: 04:05 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

namespace Experimental\DI;


class TestBean {

    private $name;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }



}