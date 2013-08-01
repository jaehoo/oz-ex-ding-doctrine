<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 20/07/13
 * Time: 12:10
 * To change this template use File | Settings | File Templates.
 */

require_once "../../../../../../../include.php";
require_once "TransactionalService.php";

use Test\Transactional\TransactionalService;

use Ding\Container\Impl\ContainerImpl as DingContainer;

$options = array('ding' => array(
    'factory' => array(
        'bdef' => array(
            'xml' => array(
                'filename' => array("../datasource.xml"),
                //'directories' => array(__DIR__)
            ),
            //'annotation' => array('scanDir' => array(__DIR__))
        )
    ,'properties' => array(
            'config.dir' => "../"
        )
    )
));


$container  =  DingContainer::getInstance($options);

$bean = $container->getBean('entityManager');

$service = new TransactionalService();
$service ->setEntityManager($bean);
$service ->doBusinessJob();

//$log->info("Geeting Entity Manager...");