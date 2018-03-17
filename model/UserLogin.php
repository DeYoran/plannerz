<?php

/**
 * @Entity @Table(name="userlogins")
 **/
class UserLogin extends Model{
    //variabelen

    /** @Column(type="guid")  @Id  */
    private $userid;
    /** @Column(type="guid")  @Id  */
    private $loginid;

    /** @Column(type="integer") */
    private $rights = 0;

    public function __construct(User $user, Login $login){
        $this->userid = $user->getId()->getId();
        $this->loginid = $login->getId()->getId();
    }

    public function getRights(){
        return $this->rights;
    }

    public function setRights(int $rights){
        $this->rights = $rights;
        return $this;
    }

    public function getUserid(){
        return $this->userid();
    }

    public function getLoginid(){
        return $this->loginid();
    }

}
