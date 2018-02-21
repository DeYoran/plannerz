<?php
require_once('includes/bootstrap.php');
require_once('includes/functions.php');

//alles hieronder laad de correcte controller en action

//kijk of het pad naar de controller is doorgegeven
if(!isset($_GET['path'])){
    error("invalid_uri","No path requested");
}

//zo ja, kijk op welke wijze die moet worden geïntrepeteerd
$path = $_GET['path'];
$pathparts = explode('/', $path);
if(sizeof($pathparts) == 2){
    $controllerName = ucfirst(strtolower($pathparts[0])).'Controller';
    $action = $pathparts[1];
}
elseif(sizeof($pathparts) == 1){
    $controllerName = ucfirst(strtolower($pathparts[0])).'Controller';
    $action = "index";
}
else{
    error("invalid_uri","incomplete path");
}

//haal het bestand op (als deze bestaat) en maak de controller en voer de benodigde action uit.
$filepath = 'controller/'.$controllerName.'.php';
if(file_exists($filepath)){
    include($filepath);
    $controller = new $controllerName();
    $controller->$action();
}
else{
    error("invalid_uri","Controller not found");
}
