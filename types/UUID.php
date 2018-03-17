<?php
declare(strict_types=1);

class UUID
{

    private $id;
    private $version;

    public function __construct(string $id, int $version = null)
    {
        if ($version == null){
            $version = 4;
        }
        if(Validator::isUuid($id)){
            $this->id = $id;
        }
        else{
            throw new Exception("Not a valid UUID", 1);
        }
        $this->version = $version;
    }

    public function __toString(){
        return $this->id;
    }

    public function getId(){
        return $this->id;
    }

    public function getVersion(){
        return $this->version;
    }
}
