<?php

require_once 'src/main/php/bootstrap.php';

/**
 * Configuration to use Doctrine Command Tools
 * Created by Alberto Sánchez.
 * Date: 8/07/13
 * Time: 12:36 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">jaehoo@gmail.com</a>
 * Twitter: @Jaehoox
 */

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)
));