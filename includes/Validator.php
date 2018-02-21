<?php

class Validator
{

    private function __construct(){} //class is static so the constructor shouldn't be called and is therefore private

    public static function isUuid($input){
        $regex = '/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/';
        $compare = strtoupper($input);
        return preg_match($regex, $compare);
        // regex copied from https://stackoverflow.com/questions/1253373/php-check-for-valid-guid
    }

    public static function isEmail($input){
        #todo: implement email check
        return true;
    }

}
