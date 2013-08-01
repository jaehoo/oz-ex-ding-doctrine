<?php
/**
 * Created by JetBrains PhpStorm.
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

// IMPORTANT!! joined columns require aliased Column Name... 'f.id as fid'

$query = $entityManager -> createQuery("SELECT p.id, p.name, f.id as fid FROM \Model\Persistence\Product p JOIN p.features f WHERE p.id=:identifier");
$query -> setParameter("identifier",$p -> getId());

$result = $query -> getResult(); // Retrieve one Array with 3 values

//$users = $query->getMaxResults();
$logger->info("id: ".$result[0]['id']);
$logger->info("name: ".$result[0]['name']);
$logger->info("fid: ".$result[0]['fid']);


// Mixed Mode query result

$query = $entityManager -> createQuery("SELECT p,f.id as fid FROM \Model\Persistence\Product p JOIN p.features f WHERE p.id=:identifier");
$query -> setParameter("identifier",$p -> getId());

$result = $query -> getResult(); // Retrieve one Array with  3 values, 1 Object (2 fields) and  1 value field
//$result = $query -> getArrayResult(); // Retrieve one Array with 3 values

foreach($result as $row){
    $logger->info("id: ".$row[0]->getId());
    $logger->info("name: ".$row[0]->getName());
    $logger->info("fid: ".$row['fid']);
}

// Partial DQL, retrieve some fields into Object Entity


$query = $entityManager -> createQuery("SELECT partial p.{id}, partial f.{id} FROM \Model\Persistence\Product p JOIN p.features f WHERE p.id=:identifier");
$query -> setParameter("identifier",$p -> getId());

$result = $query -> getResult(); // Retrieve one Object (Product)


foreach($result as $row){
    $logger->info("Product: ".$row);
    //$logger->info("name: ".$row->getName());

    foreach($row->getFeatures() as $fea){
        $logger->info("feature: ".$fea);
    }
}


$logger->info("Test... end :)");

