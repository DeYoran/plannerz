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
    public function getId(){
        return $this->id;
    }

    public function setId($id, $type = "UUID"){
        return parent::setId($id, $type);
    }

    public function getEmailadress(){
        return $this->Email;
    }

    public function setEmailadress($emailadress){
        if(Validator::isEmail($emailadress)){
            $this->email = $emailadress;
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
