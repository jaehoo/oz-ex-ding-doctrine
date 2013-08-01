<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 14/07/13
 * Time: 14:39
 * To change this template use File | Settings | File Templates.
 */

require_once "../../../bootstrap.php";


spl_autoload_register(array('Doctrine', 'autoload'));
$manager = Doctrine_Manager::getInstance();
$manager->openConnection('mysql://root:root@127.0.0.1/OZ_TESTS');

Doctrine::dropDatabases();
Doctrine::createDatabases();
Doctrine::generateModelsFromYaml("./schema.yml", "application/models",
    array('generateTableClasses' => true));
Doctrine::createTablesFromModels('application/models');