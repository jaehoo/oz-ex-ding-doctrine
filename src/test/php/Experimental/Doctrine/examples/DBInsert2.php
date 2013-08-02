<?php
/**
 * Example to get Single object without Lazy initialization
 * User: jaehoo
 * Date: 13/07/13
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

require_once "../bootstrap.php";



use Model\Persistence\Person;
use Model\Persistence\Tarea;


$logger = Logger::getLogger('TestDoctrine');

$p= new Person();
$p->setName("beto");

$t= new Tarea();
$t2= new Tarea();
$t->setIdPerson($p);
$t2->setIdPerson($p);

$tareas= new \Doctrine\Common\Collections\ArrayCollection();
$tareas[]=$t;
$tareas[]=$t2;

$p->setTareas($tareas);


$entityManager->persist($p);
$entityManager->flush();

$logger->info("Generated id:".$p->getId());

$query = $entityManager->createQuery('SELECT u FROM Model\Persistence\Person u WHERE u.id = :identifier');
$query ->setParameter('identifier',$p->getId());

$users = $query->getResult();

//$users = $query->getMaxResults();
$logger->info("id: ".$users[0]->getId());
$logger->info("name: ".$users[0]->getName());

$logger->info("User Tasks:");

// Get user Task ----- :o
$getTasks=$users[0]->getTareas();

foreach ($getTasks as $nt) {
    $logger->info("\ttask:".$nt->getId()."\tidPerson:".$nt->getIdPerson()->getId());
}

