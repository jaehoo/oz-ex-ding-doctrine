<?php
/**
 * Ecaxple to get single Object
 * User: jaehoo
 * Date: 13/07/13
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

require_once "../bootstrap.php";

use Model\Persistence\Product;


/**
 * Example single Insert
 */
$p = new Product();
$p ->setName("Test Product");

$entityManager -> persist($p);
$entityManager -> flush();

// Insert 1 row into Table Product

// Print result
$query = $entityManager -> createQuery("SELECT p FROM \Model\Persistence\Product p WHERE p.id=:identifier");
$query -> setParameter("identifier",$p -> getId());

$result = $query -> getSingleResult(); // Retrieve unique value, if not throw Exception
echo "Generated id: ".$result -> getId();
