<?php

// DatabaseEntityGenerator.php
require_once '../../../../bootstrap.php';


#Output directory
$OUTPUT_DIR="/Generator/Entities";


// Any way to access the EntityManager from  your application
$em = $entityManager;

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

/*
$conn = \Doctrine\DBAL\DriverManager::getConnection($dbParams);

$sm = $conn->getSchemaManager();

$databases = $sm->listDatabases();
foreach ($databases as $database) {
    echo $database."\n";
}*/


// Load Metadata
$em->getConfiguration()->setMetadataDriverImpl(
    new Doctrine\ORM\Mapping\Driver\DatabaseDriver( $em->getConnection()->getSchemaManager())
);

$cmf = new Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($em);
$metadata = $cmf->getAllMetadata();

$cme = new Doctrine\ORM\Tools\Export\ClassMetadataExporter();

$driverImpl = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(array(__DIR__.$OUTPUT_DIR));

//Create mapping metadata
$exporter = $cme->getExporter("xml", __DIR__.$OUTPUT_DIR);
$exporter->setMetadata($metadata);
$exporter->setOverwriteExistingFiles(true);
$exporter->export();

echo "Creating Entities…";
// Generate Entities

$exporter = $cme->getExporter('annotation', 'config/ann');
$generator = new Doctrine\ORM\Tools\EntityGenerator();
//$generator->setUpdateEntityIfExists(true);    // only update if class already exists
$generator->setRegenerateEntityIfExists(true);
$generator->setGenerateStubMethods(true);


# Generate Annotations
$generator->setGenerateAnnotations(true);


$result = $generator->generate($metadata, __DIR__.$OUTPUT_DIR);

echo "\n [OK]…";