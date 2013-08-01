<?php

/*ini_set(
    'include_path',
    implode(
        PATH_SEPARATOR,
        array(
            implode(DIRECTORY_SEPARATOR, array('..', '..', '..', 'resources')),
            ini_get('include_path'),
        )
    )
);*/


// Include Required libraries
#require_once 'log4php/Logger.php';
#require_once 'Ding/Autoloader/Autoloader.php';

require_once "../../../vendor/autoload.php";
require_once "../../../bootstrap.php";

//Ding\Autoloader\Autoloader::register(); // Call autoloader register for ding autoloader.
use Ding\Container\Impl\ContainerImpl;
//
//
//ini_set(
//    'include_path',
//    implode(
//        PATH_SEPARATOR,
//        array(
//            implode(DIRECTORY_SEPARATOR, array( '..', 'src', 'test','Model')),
//            ini_get('include_path'),
//        )
//    )
//);
//
//
//
//// Here you configure the container, its subcomponents, drivers, etc.
//$properties = array(
//    'ding' => array(
//        'log4php.properties' => SRC_DIR.'resources/log4php.xml',
//        'factory' => array(
//            'bdef' => array( // Both of these drivers are optional. They are both included just for the thrill of it.
//                'xml' => array('filename' => SRC_DIR.'resources/beans.xml'),
//                'annotation' => array('scanDir' => array(realpath(__DIR__)))
//            )
//        )
//    )
//);

$container = ContainerImpl::getInstance($properties);



$bean = $container->getBean('test');

var_dump($bean->getName());


echo realpath(__DIR__);

?>