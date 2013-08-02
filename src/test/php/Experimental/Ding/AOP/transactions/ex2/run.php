<?php

require_once "../../../../../../../include.php";


require_once __DIR__ . '/TransactionalAspect.php';
require_once __DIR__ . '/TransactionalService2.php';

//require_once 'Ding/Autoloader/Autoloader.php';
//Ding\Autoloader\Autoloader::register();

$options = array('ding' => array(
    'factory' => array(
        'bdef' => array(
            'xml' => array(
                'filename' => array('../datasource.xml','beans.xml'),
                'directories' => array(__DIR__)
            )
        )
    ,'properties' => array(
            'config.dir' => "../"
        )
    )
));

use Ding\Container\Impl\ContainerImpl as DingContainer;
$container = DingContainer::getInstance($options);

$bean = $container->getBean('myService');
$bean->doBatch();
$bean->doBusinessJob();
$bean->doBusinessProcess();

