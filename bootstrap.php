<?php

/**
 * Bootstrap configuration Ding and Doctrine
 * Created by Alberto Sánchez.
 * Date: 8/07/13
 * Time: 12:36 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">jaehoo@gmail.com</a>
 * Twitter: @Jaehoox
 */

require_once "include.php";

use \Ding\Container\Impl\ContainerImpl;

Logger::configure(SRC_DIR.'resources/log4php.xml');
$log = Logger::getLogger('DingContainer');
$log->info("Start Ding Container Configuration...");

// Here you configure the container, its subcomponents, drivers, etc.
$properties = array(
    'ding' => array(
        'log4php.properties' => SRC_DIR."resources/log4php.xml",
        'factory' => array(
            'bdef' => array( // Both of these drivers are optional. They are both included just for the thrill of it.
                'xml' => array(
                    'filename' =>  array('datasource.xml','beans.xml','aspects.xml'),
                    'directories' => array(SRC_DIR.'php',SRC_DIR.'resources')
                ),
                //'annotation' => array('scanDir' => array(SRC_DIR.'php/')),
            ),
            // These properties will be used by the container when instantiating the beans, see beans.xml
            'properties' => array(
                'config.dir' => SRC_DIR.'resources/'
            )
        )
//    ,
//        // You can configure the cache for the bean definition, the beans, and the proxy definitions.
//        // Other available implementations: zend, file, dummy, and memcached.
//        'cache' => array(
//            'proxy' => array('impl' => 'apc'),
//            'bdef' => array('impl' => 'apc'),
//            'beans' => array('impl' => 'apc')
//        )
    )
);

$container = ContainerImpl::getInstance($properties);

//Getting Doctrine EntityManager
$entityManager = $container->getBean('entityManager');

$log->info("End Ding Container Configuration...");
