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

    private function attemptToChangeId($id){
        if(isset($this->id)){
            $this->fault('unchangable', ['value'=> 'id']);
            return $this;
        }
        $this->id = $id;
    }

}
