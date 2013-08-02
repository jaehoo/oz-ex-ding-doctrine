<?php

require_once 'bootstrap.php';

///**
// * Created by Alberto Sánchez.
// * Date: 8/07/13
// * Time: 12:36 PM
// * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
// * Twitter: @Jaehoox
// */
//
//require_once "vendor/autoload.php";
//
//use Doctrine\ORM\Tools\Setup;
//use Doctrine\ORM\EntityManager;
//use Doctrine\ORM\Tools\Console\ConsoleRunner;
//
//define("ROOT_DIR", __DIR__ .DIRECTORY_SEPARATOR);
//
////$paths = array([__DIR__."/src/main", __DIR__."/src/test"]);
//$paths = array(__DIR__."/src/main/Model/");
//$isDevMode = false;
//
//// the connection configuration
//$dbParams = array(
//    'driver'   => 'pdo_mysql',
//    'user'     => 'root',
//    'password' => 'root',
//    'host'     => '127.0.0.1',
//    'dbname'   => 'OZ_TASKS',
//);
//
//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
//
//// (4) Driver
//$driverImpl = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(array(__DIR__."/src/main/Model/Persistence/"));
////$driverImpl = new Doctrine\ORM\Mapping\Driver\YamlDriver(“./config/yml/”);
////$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(“./config/xml/”);
//$config->setMetadataDriverImpl($driverImpl);
//
//
//$entityManager = EntityManager::create($dbParams, $config);
//
//
//# if you prefer XML
//#$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
//#$entityManager = EntityManager::create($dbParams, $config);
//
//# if you prefer YAML
//#$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
//#$entityManager = EntityManager::create($dbParams, $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));