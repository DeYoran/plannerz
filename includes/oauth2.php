<?php
use OAuth2\Autoloader;
use OAuth2\Storage\Pdo;
use OAuth2\Server;

$oauth2_dsn      = 'mysql:dbname='.DBNAME.';host='.DBHOST;
$oauth2_username = DBUSER;
$oauth2_password = DBPASS;

require_once("vendor/autoload.php");
Autoloader::register();

$oauth2_storage = new Pdo(array('dsn' => $oauth2_dsn, 'username' => $oauth2_username, 'password' => $oauth2_password));
$oauth2_server = new Server($oauth2_storage);
$oauth2_server->addGrantType(new OAuth2\GrantType\ClientCredentials($oauth2_storage));
$oauth2_server->addGrantType(new OAuth2\GrantType\AuthorizationCode($oauth2_storage));
