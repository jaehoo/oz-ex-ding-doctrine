<?php
/**
 * Example to get single objects
 * User: jaehoo
 * Date: 13/07/13
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

require_once "../bootstrap.php";


use Model\Persistence\Feature;
use Model\Persistence\Product;


$logger = Logger::getLogger('TestDoctrine');


/**
 * Example single Insert
 */
$p = new Product();
$p -> setName("Test Product2");

$f = new Feature();
$f -> setProduct($p);

$features = new \Doctrine\Common\Collections\ArrayCollection();
$features[]=$f;

$p -> setFeatures($features);

$entityManager->persist($p);
$entityManager->flush();

// As result insert 2 rows, into table Product and Features
$logger ->info("Product: ". $p->getId());
$logger ->info("Feature: ". $f->getId());


$logger ->info("[ Example DQL JOIN ]");
$logger ->info("Loading data form db...");


$query = $entityManager -> createQuery("SELECT p, f FROM \Model\Persistence\Product p JOIN p.features f WHERE p.id=:identifier");
$query -> setParameter("identifier",$p -> getId());

//printf("\n\n".$query -> getSQL());

$result = $query -> getResult(); // Retrieve one Array with 2 Objects


foreach ($result as $row) {

    $logger ->info(":".$row);
    $resFeatures=$row -> getFeatures();

    foreach ($resFeatures as $rf) {
        $logger ->info(":".$rf);
    }

//    echo "Id: " . $row[0]->getId();
//    echo "name: " . $row[0]->getName();
//    echo "Prod Name: " . $row['PROD_NAME'];

}

$logger ->info("[ Example DQL LEFT JOIN ]");
$logger ->info("Loading data form db...");

$query = $entityManager -> createQuery("SELECT p, f as article FROM \Model\Persistence\Product p LEFT JOIN p.features f WHERE p.id=:identifier");
$query -> setParameter("identifier",$p -> getId());


$result = $query -> getResult();

foreach ($result as $row) {
    //printf($row);
    $logger ->info(":".$row);
    $resFeatures=$row -> getFeatures();

    foreach ($resFeatures as $rf) {
        $logger ->info(":".$rf);
    }
}
