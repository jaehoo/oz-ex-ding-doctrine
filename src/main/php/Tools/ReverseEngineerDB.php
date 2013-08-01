<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alberto
 * Date: 17/11/11
 * Time: 11:30 AM
 *
 * Genera los objetos del modelo de la base de datos
 *
 */

require_once "../../../../include.php";
require_once "Doctrine/ORM/Tools/Setup.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\Mapping\Driver\YamlDriver;
use Doctrine\ORM\Mapping\Driver\DatabaseDriver;
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\ORM\Tools\Export\ClassMetadataExporter;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Symfony\Component\Console\Helper\HelperSet;


// (1) Load Classes
Setup::registerAutoloadPEAR();

// (2) Configuración
$config = new \Doctrine\ORM\Configuration();

// (3) Caché, in production use APC
$cache = new \Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

// (4) Driver select Driver [annotationsClasses,classes,xml, yml]
$driverType="annotationsClasses";
$driverImpl = getDriver($driverType);

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
$helperSet = new HelperSet(
    array(
         'db' => new ConnectionHelper($em->getConnection()),
         'em' => new EntityManagerHelper($em)
    ));

// Load Metadata
$em->getConfiguration()->setMetadataDriverImpl(
    new DatabaseDriver( $em->getConnection()->getSchemaManager())
);

$cmf = new DisconnectedClassMetadataFactory();
$cmf->setEntityManager($em);
$metadata = $cmf->getAllMetadata();

$cme = new ClassMetadataExporter();

//Create mapping metadata
if($driverType=="xml" || $driverType=="yml"){
    $exporter = $cme->getExporter($driverType, BASE_DIR."/config/".$driverType);
    $exporter->setMetadata($metadata);
    $exporter->export();
    echo "make config files: ".$driverType;
}

// Create Objects 
makeEntities($cme,$metadata,$driverType);


function makeEntities($cme,$metadata,$driverType){

    echo "make entities...";
    // Generate Entities

    $exporter = $cme->getExporter('annotation', 'config/ann');
    $generator = new EntityGenerator();
    $generator->setUpdateEntityIfExists(true);	// only update if class already exists
    $generator->setGenerateStubMethods(true);
    if($driverType=="annotationsClasses"){
        $generator->setGenerateAnnotations(true);
    }
    else{
        $generator->setGenerateAnnotations(false);
    }
    $result = $generator->generate($metadata, BASE_DIR."/Entities");

    echo "done...";

}


function getDriver($variable){

    $driverImpl= null;

    if($variable=="annotationsClasses" || $variable=="classes")
    {
        $driverImpl = new AnnotationDriver(array(BASE_DIR."/Entities"));
    }
    else if($variable=="xml"){
        $driverImpl = new XmlDriver(BASE_DIR."/config/xml/");
    }
    else if($variable=="yml"){
        $driverImpl = new YamlDriver(BASE_DIR."/config/yml/");
    }
    else{
        echo "Select one Driver...";
        exit;
    }
    return $driverImpl;
}