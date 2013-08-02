<?php
require_once "../../../../../../include.php";


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;


class TestArray{
    private $array;

    /**
     * @param mixed $array
     */
    public function setArray($array)
    {
        $this->array = $array;
    }

    /**
     * @return mixed
     */
    public function getArray()
    {
        return $this->array;
    }


}

$options = array('ding' => array(
    'factory' => array(
        'bdef' => array(
            'xml' => array(
                'filename' => array('beans.xml'),
                'directories' => array(__DIR__)
            ),
            'annotation' => array('scanDir' => array(__DIR__))
        )
    )
));

use Ding\Container\Impl\ContainerImpl as DingContainer;
$container = DingContainer::getInstance($options);

$bean = $container->getBean('testArray');


$arrayValues= array(
    'filename' => "val1",
    'directories' => "val2");

var_dump($arrayValues);




function test() {
    var_dump(func_num_args());
    var_dump(func_get_args());
}


$params = array('filename'=> "Zero",
    10,
    'glop',
    'test',
);

call_user_func_array('test', $params);