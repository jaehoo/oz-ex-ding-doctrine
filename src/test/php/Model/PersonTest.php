<?php

require_once "../../../include.php";

use Ding\Container\Impl\ContainerImpl;

// Include Required libraries
#require_once 'log4php/Logger.php';
#require_once 'Ding/Autoloader/Autoloader.php';

//Ding\Autoloader\Autoloader::register(); // Call autoloader register for ding autoloader.

/**
 * Class PersonTest
 */
class PersonTest extends PHPUnit_Framework_TestCase{

    /**
     * @var ContainerImpl
     */
    private $container;

    function __construct()
    {
        // Here you configure the container, its subcomponents, drivers, etc.
        $properties = array(
            'ding' => array(
                'log4php.properties' => SRC_DIR.'resources/log4php.xml',
                'factory' => array(
                    'bdef' => array( // Both of these drivers are optional. They are both included just for the thrill of it.
                        'xml' => array(
                            'filename' =>  array('beans.xml'),
                            'directories' => array(SRC_DIR.'php',SRC_TEST.'resources')
                        )
                    )
                )
            ));
        $this->container = ContainerImpl::getInstance($properties);
    }


    /**
     * @Test
     */
    public function testConsultarSaldo(){


        $bean = $this->container->getBean('test');
        var_dump($bean->getName());

        //echo realpath(__DIR__);

    }

}