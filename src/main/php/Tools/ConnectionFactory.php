<?php
/**
 * Created by Alberto Sánchez.
 * Date: 9/07/13
 * Time: 11:22 AM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 *
 * Example to retrieve connection for old Doctrine versions < 2.3
 */

require 'Doctrine/Common/ClassLoader.php';

use Doctrine\Common\ClassLoader;

/* Lets first load the Doctrine DBAL lbrary */
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();

/* Provide DBAL with some initial database infor */
$config = new \Doctrine\DBAL\Configuration();

function  getConnection(){
    $connectionParams = array(
        'dbname'    => 'example',
        'user'      => 'root',
        'password'  => 'root',
        'host'      => 'localhost',
        'driver'    => 'pdo_mysql',
    );

    return $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

}