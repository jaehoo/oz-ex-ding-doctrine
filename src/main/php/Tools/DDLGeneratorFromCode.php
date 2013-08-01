<?php
/**
 * Created by JetBrains PhpStorm.
 * User: alberto
 * Date: 17/11/11
 * Time: 11:07 AM
 * Example to create DDL SQL code
 */
// DatabaseEntityGenerator.php
require_once '../../../../bootstrap.php';

/* Connect to the database */
$conn= $entityManager ->getConnection();

/* We will now generate a table definition,
   but first lets get a Schema object .
*/
$schema = new \Doctrine\DBAL\Schema\Schema();


/* Now use the Schema object to create a 'CLIENT' table */
$personTable = $schema->createTable("PERSON");

/* Add some columns to the table */
$personTable->addColumn("id", "integer", array("unsigned" => true));
$personTable->addColumn("first_name", "string", array("length" => 64));
$personTable->addColumn("last_name", "string", array("length" => 64));
$personTable->addColumn("email", "string", array("length" => 256));
$personTable->addColumn("website", "string", array("length" => 256));

/* Add a primary key */
$personTable->setPrimaryKey(array("id"));

/* Create another table called 'LOGIN' and add some columns */
$loginTable = $schema->createTable("LOGIN");
$loginTable->addColumn("id", "integer", array("unsigned" => true));
$loginTable->addColumn("username", "string", array("length" => 64));
$loginTable->addColumn("password", "string", array("length" => 64));
$loginTable->addUniqueIndex(array("username"));
$loginTable->setPrimaryKey(array("id"));

/* Assign a foreign key constraint to the table */
$loginTable->addForeignKeyConstraint($personTable,
                                     array("id"),
                                     array("id"),
                                     array("onDelete" => "CASCADE")
);

/* Set the Schema output platform, as we are using MySQL
   a Mysql schema will be generated. */
$platform = $conn->getDatabasePlatform();

/* The 'queries' variable will now hold the
   an array of sql statements.
*/
$queries = $schema->toSql($platform);

echo "\n -- MySQL Scripts \n\n";
printScript($queries);

//make oracle scripts
$myPlatform = new \Doctrine\DBAL\Platforms\OraclePlatform();
$queries = $schema->toSql($myPlatform);

echo "\n -- ORACLE Scripts \n\n";
printScript($queries);



/**
 * Print query array
 * @param $querys
 * @return void
 */
function printScript($querys){
    foreach( $querys as $query ){
        echo $query."\n" ;
    }

}

