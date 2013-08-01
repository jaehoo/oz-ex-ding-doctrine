<?php

require_once __DIR__."/../../../../vendor/autoload.php";

/**
 * Created by Alberto Sánchez.
 * Date: 8/07/13
 * Time: 12:36 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// Path to domain/persistence objects
$paths = array("Entities/");
$isDevMode = false;


// To view Doctrine sql Log
$logger = new \Doctrine\DBAL\Logging\EchoSQLLogger();

// (4) Driver
$driverImpl = Doctrine\ORM\Mapping\Driver\AnnotationDriver::create($paths);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$config->setSQLLogger($logger);
$config->setMetadataDriverImpl($driverImpl);
// Only for production environment
//$config->setProxyDir(ROOT_DIR.'Proxies');
//$config->setProxyNamespace('Proxies');
//$config->setAutoGenerateProxyClasses(false);
//$config->setEntityNamespaces();

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'host'     => '127.0.0.1',
    'dbname'   => 'OZ_TASKS',
    'charset' => 'UTF8',
);


// Create EntityManager
$entityManager = EntityManager::create($dbParams, $config);

# if you prefer XML
#$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
#$entityManager = EntityManager::create($dbParams, $config);

# if you prefer YAML
#$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
#$entityManager = EntityManager::create($dbParams, $config);

