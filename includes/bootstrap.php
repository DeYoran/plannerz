<?php
declare(strict_types=1);

require_once("includes/config.php");
require_once("includes/config.template.php");

if(CONFIG_VERSION !== $templateversion){
    die('invalid config file');
}

if (version_compare(phpversion(), '7.0.0', '<')) {
    die('php version too low');
}

require_once("includes/doctrine.php");
require_once("includes/oauth2.php");
require_once('controller/Controller.php');
require_once('includes/Validator.php');
require_once('config/constants.php');

require_once('types/UUID.php');
