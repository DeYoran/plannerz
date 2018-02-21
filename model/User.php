<?php

/**
 * @Entity @Table(name="user")
 **/
class User extends Model{
    //variabelen

    /**
     * @Column(type="guid")
     * @Id
     * @GeneratedValue(strategy="UUID")
     */
    private $id;
    /** @Column(type="string") **/
    private $displayname;

     /** @OneToMany(targetEntity="UserLogins", mappedBy="user") */
    private $uLogins;

    #todo should this be OneToMany or manyToMany?
     /** @OneToMany(targetEntity="Contacts", mappedBy="user") */
    private $contacts;

     /** @OneToMany(targetEntity="Events", mappedBy="organizer") */
    private $organizedEvents;

    /** @OneToMany(targetEntity="EventMembers", mappedBy="user") */
    private $events;


    //getters & setters
    public function getId(){
        return $this->id();
    }

    public function setId($id){
        return $this->setUuid($id);
    }

    public function getDisplayName(){
        return $this->displayName;
    }

    public function setDisplayName($name){
        $this->displayName = $name;
    }

}
