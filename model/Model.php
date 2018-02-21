<?php

Class Model{

    protected function fault($type, $params){
        switch ($type) {
            case 'type':
                $dbbt = debug_backtrace();
                $func = $dbbt[1]['function'];
                throw new Exception("The function $func expects $params[type] as input");
                break;
            case 'unchangable':
                throw new Exception("The value '$params[value]' can't be changed");
                break;
            default:
                throw new Exception("Unkown error");
                break;
        }
    }

    protected function isuuid($presumedUuid){
        $regex = '/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/';
        $compare = strtoupper($presumedUuid);
        return preg_match($regex, $compare);
        // regex copied from https://stackoverflow.com/questions/1253373/php-check-for-valid-guid
    }

}
