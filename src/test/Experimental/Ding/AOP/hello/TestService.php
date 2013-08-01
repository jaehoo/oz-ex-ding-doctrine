<?php

namespace Experimental\DI;


class TestService {


    private $name;

    public function execute(){

        printf(" Method Execution...\n");

    }

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