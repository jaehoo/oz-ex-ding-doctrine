<?php

require_once "../../../../../../include.php";

use \Ding\Container\Impl\ContainerImpl;

// Here you configure the container, its subcomponents, drivers, etc.
$properties = array(
    'ding' => array(
        'log4php.properties' => 'log4php.xml',
        'factory' => array(
            'bdef' => array( // Both of these drivers are optional. They are both included just for the thrill of it.
                'xml' => array(
                    'filename' => 'beans.xml'
                    //'directories' => array($confDir . '/support'),
                ),
                'annotation' => array('scanDir' => array(realpath(__DIR__)))
            ),
            // These properties will be used by the container when instantiating the beans, see beans.xml
            'properties' => array(
                'user.name' => 'nobody',
                'user.namex' => 'nobody',
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
$proxyBean=  $container->getBean('testProxyBean');

$proxyBean->execute();