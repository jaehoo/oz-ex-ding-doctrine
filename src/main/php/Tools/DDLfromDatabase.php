<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alberto
 * Date: 17/11/11
 * Time: 07:28 PM
 */
require_once '../../../../bootstrap.php';

$conn = $entityManager->getConnection();
$sm = $conn->getSchemaManager();

/**
 * List Databases
 * Retrieve an array of databases on the configured connection:
 **/
echo "\n[ DATABASES ]\n";

$databases = $sm->listDatabases();

foreach ($databases as $database) {
    echo $database."\n";
}


/**
 * List Tables & Columns
 * Retrieve an array of table names
 **/

$tableNames=$sm->listTableNames();
foreach($tableNames as $table){
    echo $table."\n";
}

/**
 * List Tables & Columns details
 * Retrieve an array of table names
 **/
echo "\n[ TABLE NAMES & COLUMNS ]\n";

$tables = $sm->listTables();
foreach ($tables as $table) {
    echo "TABLE: [".$table->getName()."] Columns: \n";

    // Print column names
    foreach ($table->getColumns() as $column) {
        echo ' - ' . $column->getName() . "\n";
    }
}

echo "\n";

// Retrieve an array of Doctrine\DBAL\Schema\Column instances that exist for the given table
$columns = $sm->listTableColumns('USER');
foreach ($columns as $column) {
    echo $column->getName() . ' : ' . $column->getType() . "\n";
}


echo "\n -- MySQL Scripts \n\n";
/**
 * =============================
 * Create  SQL script
 * =============================
 */
$dbSchema= $sm->createSchema();
$platform = $conn->getDatabasePlatform();
$script= $dbSchema->toSql($platform);

print_r($script);


/**
 * =============================
 * Migrate Data base
 * =============================
 */
echo "\n -- Migrate Database \n";

// MYySQL Script
$dbSchemaSource= $sm->createSchema();
$mysqlPlatform = $conn->getDatabasePlatform();
$queries = $dbSchemaSource->toSql($mysqlPlatform);

echo "\n -- MySQL Scripts \n\n";
print_r($queries);

// Oracle scripts
$oraclePlatform = new \Doctrine\DBAL\Platforms\OraclePlatform();
$queries = $dbSchemaSource->toSql($oraclePlatform);

echo "\n -- ORACLE Scripts \n\n";
print_r($queries);

///**
// * Migrate DB
// */
//$fromSchema = $sm->createSchema();
//$toSchema = clone $fromSchema;
//
//$sqlScript = $fromSchema->getMigrateToSql($toSchema,  $conn->getDatabasePlatform());
////$script= $fromSchema->toSql($conn->getDatabasePlatform());
////print_r($sql);
//print_r($sqlScript);

