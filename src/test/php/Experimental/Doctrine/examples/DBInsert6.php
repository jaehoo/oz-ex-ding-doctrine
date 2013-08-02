<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 13/07/13
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */

require_once "../bootstrap.php";

use Model\Persistence\Order;
use Model\Persistence\Item;
use Model\Persistence\OrderItem;

$logger = Logger::getLogger('TestDoctrine');

$order = new Order();
$order->setPayed(true);
$order->setShipped(true);
$order->setCreated(new DateTime('now'));

$entityManager->persist($order);
$entityManager->flush();

$logger ->info("Item id: ". $order->getId());


$item = new Item();
$item ->setName("PS4 :p");
$item ->setCurrentPrice(7400.00);

$entityManager->persist($item);
$entityManager->flush();

$logger ->info("Item id: ". $item->getId());


$orderItem  = new OrderItem();
$orderItem ->setOrder($order);
$orderItem ->setItem($item);
$orderItem ->setAmount(10);
$orderItem ->setOfferedPrice(10000.00);

$entityManager ->persist($orderItem);
$logger ->info("Order Item". $orderItem);

$entityManager->flush();


