<?php
use OAuth2\Request;

class Controller{

    protected $em;
    protected $oa2s;

    protected function __construct(){
        global $doc2_entityManager;
        global $oauth2_server;

        $this->em = $doc2_entityManager;
        $this->oa2s = $oauth2_server;
    }

    protected function verify(){
        /*
        deze functie kijkt of er een authenticatie token is verstuurd, en zo ja of die nog geldig is.
        de return waarde is is de data die in de database aan de token is gekoppeld, waaronder het klantnr behorende
        bij de token.
        */
        $reqFromGlob = Request::createFromGlobals();
        if (!$this->oa2s->verifyResourceRequest($reqFromGlob)) {
            $this->oa2s->getResponse()->send();
            die;
        }
        return $this->oa2s->getAccessTokenData($reqFromGlob);
    }

    protected function checkParams($requirements, $params){
        //kijkt of alle opgegeven parameters in de request zijn meegegeven
        foreach ($requirements as $name => $type) {
            if(!isset($params[$name])){
                error("ontbrekende_parameter", "$name is een verplichte parameter");
            }
            if(!$this->checktype($params[$name],$type)){
                error("incorrecte_parameter", "$name moet een $type zijn");
            }
        }
        return true;
    }

    private function checktype($variable, $type){
        //kijkt of het type van variable is wat er wordt gevraagd
        switch($type){
            case "int":
                return ctype_digit($variable); //ctype_digit word gebruikt in plaats van is_int, omdat is_int niet werkt
                                               //voor de request.
            case "string":
                return is_string($variable);
        }
    }

}
