<?php

require_once("includes/config.php");
require_once("includes/config.template.php");

if(CONFIG_VERSION !== $templateversion){
    die('invalid config file');
}

require_once("includes/doctrine.php");
require_once("includes/oauth2.php");
require_once('controller/Controller.php');
require_once('includes/Validator.php');
