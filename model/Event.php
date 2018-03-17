<?php

/**
 * @Entity @Table(name="events")
 **/
class Event extends Model{
    //variabelen

    /** @Column(type="guid")  @Id  @GeneratedValue(strategy="UUID")*/
    private $id;
    /** @Column(type="guid") */
    private $organizer;

    /** @OneToMany(targetEntity="EventMember", mappedBy="event") */
   private $members;


   public function getUUID(){
       return new UUID($this->id);
   }

   public function getId(){
       return $this->id;
   }

   public function setId(UUID $id){
       return $this->attemptToChangeId($uuid->getId());
   }

    public function getOrganizerId(){
        return new UUID($this->organizer);
    }

    public function setOrganizerId(UUID $id){
        $this->organizer = $id->getId();
    }

}
