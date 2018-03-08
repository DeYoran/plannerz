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

    public function getId(){
        return $this->id;
    }

    public function setId($id, $type = 'UUID'){
        return parent::setId($id, $type);
    }

    public function getOrganizerId(){
        return $this->organizer;
    }

    public function setOrganizerId($id){
        if(Validator::isUuid($id)){
            $this->organizer = $id;
            return $this;
        }
        $this->fault('type', ['type'=> 'uuid (string)']);
    }

}
