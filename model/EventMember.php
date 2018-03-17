<?php

/**
 * @Entity @Table(name="eventmember")
 **/
class EventMember extends Model{
    //variabelen
    /** @Column(type="guid")  @Id  */
    private $userid;
    /** @Column(type="guid")  @Id  */
    private $eventid;
    /** @Column(type="int")  */
    private $role;
    /** @Column(type="int")  */
    private $attending;

    public function __construct(User $user, Event $event){
        $this->userid = $user->getId()->getId();
        $this->$eventid = $event->getId()->getId();
        $this->role = Role::INVITED;
        $this->attending = Attending::PENDING;
    }

    public function getUserid(){
        return $this->userid;
    }

    public function setUserid(string $userid){
        $this->userid = $userid;
        return $this;
    }

    public function getEventid(){
        return $this->eventid;
    }

    public function setEventid(string $eventid){
        $this->eventid = $eventid;
        return $this;
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole(int $role){
        $this->role = $role;
        return $this;
    }

    public function getAttending(){
        return $this->attending;
    }

    public function setAttending(int $attending){
        $this->attending = $attending;
        return $this;
    }
}
