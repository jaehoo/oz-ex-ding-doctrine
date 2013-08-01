<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alberto
 * Date: 17/11/11
 * Time: 11:00 AM
 * To change this template use File | Settings | File Templates.
 */


use Doctrine\ORM\Tools\Setup;

require_once "../include.php";
require_once "Doctrine/ORM/Tools/Setup.php";
require_once "../Entities/User.php";

Setup::registerAutoloadPEAR();

// (1) Autocargamos clases
/*require_once 'Doctrine/Common/ClassLoader.php';
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();*/

// (2) Configuración
$config = new \Doctrine\ORM\Configuration();

// (3) Caché
$cache = new \Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

// (4) Driver
$driverImpl = $config->newDefaultAnnotationDriver(array(BASE_DIR."/Entities"));

//$driverImpl = new Doctrine\ORM\Mapping\Driver\YamlDriver("./config/yaml/");
//$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver("./config/xml/");

$config->setMetadataDriverImpl($driverImpl);

// (5) Proxies
$config->setProxyDir(BASE_DIR.'/Proxies');
$config->setProxyNamespace('Proxies');

// (6) Conexión
$connectionOptions = array(
    'dbname'    => 'doctrine',
        'user'      => 'root',
        'password'  => 'root',
        'host'      => 'localhost',
        'driver'    => 'pdo_mysql',
);

// (7) EntityManager
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

// (8) HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

$user= new User();
$user->setName("Alberto");
$user->setPassword("abc");


$em->persist($user);
$em->flush();
