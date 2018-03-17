<?php

/**
 * @Entity @Table(name="users")
 **/
class User extends Model{
    //variabelen

    /** @Column(type="guid")  @Id  @GeneratedValue(strategy="UUID")*/
    protected $id;
    /** @Column(type="string") **/
    private $displayName;

     /** @OneToMany(targetEntity="UserLogin", mappedBy="user") */
    private $uLogins;

    #todo should this be OneToMany or manyToMany?
     /* @OneToMany(targetEntity="Contacts", mappedBy="user") */
    private $contacts;

     /* @OneToMany(targetEntity="Event", mappedBy="organizer") */
    private $organizedEvents;

    /* @OneToMany(targetEntity="EventMember", mappedBy="user") */
    private $events;


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

    public function getDisplayName(){
        return $this->displayName;
    }

    public function setDisplayName($name){
        $this->displayName = $name;
    }

}
