<?php

/**
 * @Entity @Table(name="login")
 **/
class UserLogin extends Model{
    //variabelen

    /** @Column(type="guid")  @Id  */
    private $userid;
    /** @Column(type="guid")  @Id  */
    private $loginid;

    /** @Column(type="int") */
    private $rights;

    public function getRights(){
        return $this->rights;
    }

    public function setRights($rights){
        if(Validator::isInt($rights)){
            $this->rights = $rights;
            return $this;
        }
        $this->fault('type', ['type'=> 'int']);
    }

    public function getUserid(){
        return $this->userid();
    }

    public function getLoginid(){
        return $this->loginid();
    }

}
