<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once("vendor/autoload.php");
$doc2_isDevMode = true;
$doc2_config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $doc2_isDevMode);

$doc2_conn = array();
$doc2_conn['driver'] = "pdo_mysql";
$doc2_conn['host'] = DBHOST;
$doc2_conn['dbname'] = DBNAME;
$doc2_conn['user'] = DBUSER;
$doc2_conn['password'] = DBPASS;

$doc2_entityManager = EntityManager::create($doc2_conn, $doc2_config);
