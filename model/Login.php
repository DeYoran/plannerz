<?php

/**
 * @Entity @Table(name="login")
 **/
class Login extends Model{
    //variabelen

    /**
     * @Column(type="guid")
     * @Id
     * @GeneratedValue(strategy="UUID")
     */
    protected $id;
    /** @Column(type="string") **/
    private $emailadress;
    /** @Column(type="string") **/
    private $password;

     /** @OneToMany(targetEntity="UserLogins", mappedBy="user") */
    private $uLogins;

    //getters & setters
    public function getId(){
        return $this->id();
    }

    public function setId($id){
        return $this->setUuid($id);
    }

    public function getEmailadress(){
        return $this->Emailadress;
    }

    public function setEmailadress($emailadress){
        if(Validator::isEmail($emailadress)){
            $this->emailadress = $emailadress;
            return $this;
        }
        $this->fault('type', ['type'=> 'emailadress (string)']);
    }

    public function checkPassword($password){
        return password_verify($password, $this->password);
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }


}
