<?php

/**
 * @Entity @Table(name="logins")
 **/
class Login extends Model{
    //variabelen

    /** @Column(type="guid")  @Id  @GeneratedValue(strategy="UUID")*/
    protected $id;
    /** @Column(type="string") **/
    private $email;
    /** @Column(type="string") **/
    private $password;

     /** @OneToMany(targetEntity="UserLogin", mappedBy="user") */
    private $uLogins;

    //getters & setters
    public function getUUID(){
        return new UUID($this->id);
    }

    public function getId(){
        return $this->id;
    }

    public function setId(UUID $id){
        return $this->attemptToChangeId($uuid->getId());
    }

    public function getEmailadress(){
        return $this->Email;
    }

    public function setEmailadress(string $emailadress){
        if(Validator::isEmail($emailadress)){
            $this->email = $emailadress;
            return $this;
        }
        $this->fault('type', ['type'=> 'emailadress']);
    }

    public function checkPassword($password){
        return password_verify($password, $this->password);
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }

}
