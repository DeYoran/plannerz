<?php

Class Model{

    protected function fault($type, $params){
        switch ($type) {
            case 'type':
                $dbbt = debug_backtrace();
                $functie = $dbbt[1]['functie'];
                throw new Exception("De functie $functie verwacht een $params[type]");
                break;
            case 'onaanpasbaar':
                throw new Exception("De waarde '$params[waarde]' kan niet (meer) worden angepast");
                break;
            default:
                throw new Exception("Onbekende fout");
                break;
        }
    }

}
