<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 13/07/13
 * Time: 12:43
 * To change this template use File | Settings | File Templates.
 */

$config = new \Doctrine\ORM\Configuration();// (3) Caché, in production use APC
$cache = new \Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);// (4) Driver select Driver [annotationsClasses,classes,xml, yml]
$driverType='annotationsClasses';
$driverImpl = getDriver($driverType);

$config->setMetadataDriverImpl($driverImpl);

// (5) Proxies
$config->setProxyDir(__DIR__.'/Proxies');
$config->setProxyNamespace('Proxies');

// the connection configuration
$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'host'     => '127.0.0.1',
    'dbname'   => 'OZ_TASKS',
);


// (7) EntityManager
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

// (8) HelperSet
$helperSet = new Symfony\Component\Console\Helper\HelperSet(
    array(
'db' => new Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
'em' => new Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

// Load Metadata
$em->getConfiguration()->setMetadataDriverImpl(
    new Doctrine\ORM\Mapping\Driver\DatabaseDriver( $em->getConnection()->getSchemaManager())
);

$cmf = new Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($em);
$metadata = $cmf->getAllMetadata();

$cme = new Doctrine\ORM\Tools\Export\ClassMetadataExporter();